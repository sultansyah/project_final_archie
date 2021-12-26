<?php
require "../../koneksi.php";

if (isset($_POST['tambah'])) {
    tambah_data();
} elseif (isset($_POST['edit'])) {
    edit_data();
} elseif (isset($_POST['hapus'])) {
    hapus_data();
} else {
    redirect_page("Mohon masuk ke halaman data dosen terlebih dahulu");
}

//function untuk menampilkan alert dan mendirect ke halaman data dosen
function redirect_page($message)
{
    echo '<script>alert("' . $message . '");</script>';
    // echo '<script>window.location="../dd";</script>';
}

function tambah_data()
{
    global $conn;
    $ukuran_gambar = $_FILES['gambar']['size'];
    if ($ukuran_gambar < 2044070) {
        $nip = $_POST['nip'];
        $level = $_POST['level'];

        if ($nip != "") {
            $password_dosen = md5($nip);
            $username_dosen = $nip;
            $cek_dosen = mysqli_query($conn, "SELECT * FROM tb_dosen WHERE nip = '$nip'");
            $cek_dosen2 = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username_dosen'");
            $hasil_dosen = mysqli_fetch_array($cek_dosen);
            $hasil_dosen2 = mysqli_fetch_array($cek_dosen2);

            if (isset($hasil_dosen['nip']) and isset($hasil_dosen2['username']) and $hasil_dosen['nip'] == $nip and $hasil_dosen2['username'] == $username_dosen) {
                redirect_page("Data kode dosen yang anda masukkan sudah ada");
            } else {
                $add_user = mysqli_query($conn, "INSERT INTO tb_user (username, password, level) VALUES ('$username_dosen', '$password_dosen', '$level')");

                if ($add_user) {
                    $select_user = mysqli_query($conn, "SELECT id_user FROM tb_user WHERE username = '$username_dosen'");

                    if ($select_user) {
                        $hasil_user = mysqli_fetch_array($select_user);
                        $id_user = $hasil_user['id_user'];
                        $nama = $_POST['nama'];
                        $jurusan = $_POST['jurusan'];
                        $prodi = $_POST['prodi'];
                        $jenis_kelamin = $_POST['jenis_kelamin'];
                        $no_hp = $_POST['no_hp'];
                        $alamat = $_POST['alamat'];
                        $nama_gambar_tmp = $_FILES['gambar']['name'];
                        $nama_gambar_lower_str = strtolower($nama_gambar_tmp);
                        $file_tmp = $_FILES['gambar']['tmp_name'];

                        while (true) {
                            $nama_gambar = rand(1000, 1000000) . "." . $nama_gambar_lower_str;
                            $cek_nama_gambar = mysqli_query($conn, "SELECT * FROM tb_dosen WHERE gambar_dosen = '$nama_gambar'");
                            $hasil_cek_gambar = mysqli_fetch_array($cek_nama_gambar);
                            if (isset($hasil_cek_gambar['gambar_dosen']) and $hasil_cek_gambar['gambar_dosen'] == $nama_gambar) {
                                continue;
                            } else {
                                break;
                            }
                        }

                        $tambah_dosen = mysqli_query($conn, "INSERT INTO tb_dosen(id_user, nip, nama_dosen, jurusan, prodi, jenis_kelamin, no_hp, alamat, gambar__dosen) VALUES ('$id_user', '$nip', '$nama', '$jurusan', '$prodi', '$jenis_kelamin', '$no_hp', '$alamat', '$nama_gambar')");

                        if ($tambah_dosen) {
                            move_uploaded_file($file_tmp, '../../images/dosen/' . $nama_gambar);
                            redirect_page("Penambahan data berhasil");
                        } else {
                            echo 1;
                            redirect_page("Penambahan data gagal, mohon kontak dosen");
                        }
                    } else {
                        redirect_page("Username user tidak ditemukan, mohon kontak dosen");
                    }
                } else {
                    echo 2;
                    redirect_page("Penambahan data gagal, mohon kontak dosen");
                }
            }
        } else {
            redirect_page("NIP harus diisi");
        }
    } else {
        redirect_page("Ukuran gambar melebihi 2MB, mohon kecilkan ukuran gambar");
    }
}

function hapus_data()
{
    global $conn;
    $id_dosen = $_POST['id_dosen'];
    $delete_dosen = mysqli_query($conn, "DELETE FROM tb_dosen WHERE id_dosen = '$id_dosen'");

    if ($delete_dosen) {
        $id_user = $_POST['id_user'];
        $delete_user = mysqli_query($conn, "DELETE FROM tb_user WHERE id_user = '$id_user'");
        if ($delete_user) {
            redirect_page("Penghapusan data berhasil");
        } else {
            redirect_page("Proses penghapusan gagal, mohon kontak dosen");
        }
    } else {
        redirect_page("Proses penghapusan gagal, mohon kontak dosen");
    }
}

function edit_data()
{
    global $conn;
    $id_dosen = $_POST['id_dosen'];
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $tempat_kerja = $_POST['tempat_kerja'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $nama_gambar_tmp = $_FILES['gambar']['name'];
    $gambar_tidak_update = false;

    if ($nama_gambar_tmp == '') {
        $select_nama_gambar = mysqli_query($conn, "SELECT * FROM tb_dosen WHERE id_dosen = '$id_dosen'");
        $hasil_cek_gambar = mysqli_fetch_array($select_nama_gambar);
        $nama_gambar = $hasil_cek_gambar['gambar_dosen'];
        $gambar_tidak_update = true;
    } else {
        $nama_gambar_lower_str = strtolower($nama_gambar_tmp);
        $file_tmp = $_FILES['gambar']['tmp_name'];

        while (true) {
            $nama_gambar = rand(1000, 1000000) . "." . $nama_gambar_lower_str;
            $cek_nama_gambar = mysqli_query($conn, "SELECT * FROM tb_dosen WHERE gambar_dosen = '$nama_gambar'");
            $hasil_cek_gambar = mysqli_fetch_array($cek_nama_gambar);
            if (isset($hasil_cek_gambar['gambar_dosen']) and $hasil_cek_gambar['gambar_dosen'] == $nama_gambar) {
                continue;
            } else {
                break;
            }
        }

        //mengambil nama file gambar lama
        $select_gambar_lama = mysqli_query($conn, "SELECT * FROM tb_dosen WHERE id_dosen = '$id_dosen'");
        $hasil_gambar_lama = mysqli_fetch_array($select_gambar_lama);
    }

    $update = mysqli_query($conn, "UPDATE tb_dosen SET nip='$nip', nama_dosen='$nama', tempat_kerja='$tempat_kerja', jenis_kelamin='$jenis_kelamin', no_hp='$no_hp', alamat='$alamat', gambar_dosen='$nama_gambar' WHERE id_dosen = '$id_dosen'");

    if ($update) {
        if (isset($hasil_gambar_lama['gambar_dosen'])) {
            unlink('../../images/dosen/' . $hasil_gambar_lama['gambar_dosen']);
        }
        if ($gambar_tidak_update == false) {
            move_uploaded_file($file_tmp, '../../images/dosen/' . $nama_gambar);
        }
        redirect_page("Data berhasil diedit");
    } else {
        redirect_page("Data gagal diedit, mohon kontak dosen");
    }
}