<?php
require "../../koneksi.php";

if (isset($_POST['tambah'])) {
    tambah_data();
} elseif (isset($_POST['edit'])) {
    edit_data();
} elseif (isset($_POST['hapus'])) {
    hapus_data();
} else {
    redirect_page("Mohon masuk ke halaman data admin terlebih dahulu");
}

//function untuk menampilkan alert dan mendirect ke halaman data admin
function redirect_page($message)
{
    echo '<script>alert("' . $message . '");</script>';
    echo '<script>window.location="../da";</script>';
}

function tambah_data()
{
    global $conn;
    $ukuran_gambar = $_FILES['gambar']['size'];
    if ($ukuran_gambar < 2044070) {
        $kode_admin = $_POST['kode_admin'];
        $level = $_POST['level'];

        if ($kode_admin != "") {
            $password_admin = md5($kode_admin);
            $username_admin = $kode_admin;
            $cek_admin = mysqli_query($conn, "SELECT * FROM tb_admin WHERE kode_admin = '$kode_admin'");
            $cek_admin2 = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username_admin'");
            $hasil_admin = mysqli_fetch_array($cek_admin);
            $hasil_admin2 = mysqli_fetch_array($cek_admin2);

            if (isset($hasil_admin['kode_admin']) and isset($hasil_admin2['username']) and $hasil_admin['kode_admin'] == $kode_admin and $hasil_admin2['username'] == $username_admin) {
                redirect_page("Data kode admin yang anda masukkan sudah ada");
            } else {
                $add_user = mysqli_query($conn, "INSERT INTO tb_user (username, password, level) VALUES ('$username_admin', '$password_admin', '$level')");

                if ($add_user) {
                    $select_user = mysqli_query($conn, "SELECT id_user FROM tb_user WHERE username = '$username_admin'");

                    if ($select_user) {
                        $hasil_user = mysqli_fetch_array($select_user);
                        $id_user = $hasil_user['id_user'];
                        $nama = $_POST['nama'];
                        $tempat_kerja = $_POST['tempat_kerja'];
                        $jenis_kelamin = $_POST['jenis_kelamin'];
                        $no_hp = $_POST['no_hp'];
                        $alamat = $_POST['alamat'];
                        $nama_gambar_tmp = $_FILES['gambar']['name'];
                        $nama_gambar_lower_str = strtolower($nama_gambar_tmp);
                        $file_tmp = $_FILES['gambar']['tmp_name'];

                        while (true) {
                            $nama_gambar = rand(1000, 1000000) . "." . $nama_gambar_lower_str;
                            $cek_nama_gambar = mysqli_query($conn, "SELECT * FROM tb_admin WHERE gambar_admin = '$nama_gambar'");
                            $hasil_cek_gambar = mysqli_fetch_array($cek_nama_gambar);
                            if (isset($hasil_cek_gambar['gambar_admin']) and $hasil_cek_gambar['gambar_admin'] == $nama_gambar) {
                                continue;
                            } else {
                                break;
                            }
                        }

                        $tambah_admin = mysqli_query($conn, "INSERT INTO tb_admin(id_user, kode_admin, nama_admin, tempat_kerja, jenis_kelamin, no_hp, alamat, gambar_admin) VALUES ('$id_user', '$kode_admin', '$nama', '$tempat_kerja', '$jenis_kelamin', '$no_hp', '$alamat', '$nama_gambar')");

                        if ($tambah_admin) {
                            move_uploaded_file($file_tmp, '../../images/admin/' . $nama_gambar);
                            redirect_page("Penambahan data berhasil");
                        } else {
                            echo 1;
                            redirect_page("Penambahan data gagal, mohon kontak admin");
                        }
                    } else {
                        redirect_page("Username user tidak ditemukan, mohon kontak admin");
                    }
                } else {
                    echo 2;
                    redirect_page("Penambahan data gagal, mohon kontak admin");
                }
            }
        } else {
            redirect_page("Kode admin harus diisi");
        }
    } else {
        redirect_page("Ukuran gambar melebihi 2MB, mohon kecilkan ukuran gambar");
    }
}

function hapus_data()
{
    global $conn;
    $id_admin = $_POST['id_admin'];
    $delete_admin = mysqli_query($conn, "DELETE FROM tb_admin WHERE id_admin = '$id_admin'");

    if ($delete_admin) {
        $id_user = $_POST['id_user'];
        $delete_user = mysqli_query($conn, "DELETE FROM tb_user WHERE id_user = '$id_user'");
        if ($delete_user) {
            redirect_page("Penghapusan data berhasil");
        } else {
            redirect_page("Proses penghapusan gagal, mohon kontak admin");
        }
    } else {
        redirect_page("Proses penghapusan gagal, mohon kontak admin");
    }
}

function edit_data()
{
    global $conn;
    $id_admin = $_POST['id_admin'];
    $kode_admin = $_POST['kode_admin'];
    $nama = $_POST['nama'];
    $tempat_kerja = $_POST['tempat_kerja'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $nama_gambar_tmp = $_FILES['gambar']['name'];
    $gambar_tidak_update = false;

    if ($nama_gambar_tmp == '') {
        $select_nama_gambar = mysqli_query($conn, "SELECT * FROM tb_admin WHERE id_admin = '$id_admin'");
        $hasil_cek_gambar = mysqli_fetch_array($select_nama_gambar);
        $nama_gambar = $hasil_cek_gambar['gambar_admin'];
        $gambar_tidak_update = true;
    } else {
        $nama_gambar_lower_str = strtolower($nama_gambar_tmp);
        $file_tmp = $_FILES['gambar']['tmp_name'];

        while (true) {
            $nama_gambar = rand(1000, 1000000) . "." . $nama_gambar_lower_str;
            $cek_nama_gambar = mysqli_query($conn, "SELECT * FROM tb_admin WHERE gambar_admin = '$nama_gambar'");
            $hasil_cek_gambar = mysqli_fetch_array($cek_nama_gambar);
            if (isset($hasil_cek_gambar['gambar_admin']) and $hasil_cek_gambar['gambar_admin'] == $nama_gambar) {
                continue;
            } else {
                break;
            }
        }

        //mengambil nama file gambar lama
        $select_gambar_lama = mysqli_query($conn, "SELECT * FROM tb_admin WHERE id_admin = '$id_admin'");
        $hasil_gambar_lama = mysqli_fetch_array($select_gambar_lama);
    }

    $update = mysqli_query($conn, "UPDATE tb_admin SET kode_admin='$kode_admin', nama_admin='$nama', tempat_kerja='$tempat_kerja', jenis_kelamin='$jenis_kelamin', no_hp='$no_hp', alamat='$alamat', gambar_admin='$nama_gambar' WHERE id_admin = '$id_admin'");

    if ($update) {
        if (isset($hasil_gambar_lama['gambar_admin'])) {
            unlink('../../images/admin/' . $hasil_gambar_lama['gambar_admin']);
        }
        if ($gambar_tidak_update == false) {
            move_uploaded_file($file_tmp, '../../images/admin/' . $nama_gambar);
        }
        redirect_page("Data berhasil diedit");
    } else {
        redirect_page("Data gagal diedit, mohon kontak admin");
    }
}