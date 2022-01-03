<?php
require "../../koneksi.php";

if (isset($_POST['tambah'])) {
    tambah_data();
} elseif (isset($_POST['edit'])) {
    edit_data();
} elseif (isset($_POST['hapus'])) {
    hapus_data();
} else {
    redirect_page("Mohon masuk ke halaman data mahasiswa terlebih dahulu");
}

//function untuk menampilkan alert dan mendirect ke halaman data mahasiswa
function redirect_page($message)
{
    echo '<script>alert("' . $message . '");</script>';
    echo '<script>window.location="../dm";</script>';
}

function tambah_data()
{
    global $conn;
    $ukuran_gambar = $_FILES['gambar']['size'];
    if ($ukuran_gambar < 2044070) {
        $nim = $_POST['nim'];
        $level = $_POST['level'];

        if ($nim != "") {
            $password_mahasiswa = md5($nim);
            $username_mahasiswa = $nim;
            $cek_mahasiswa = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE nim = '$nim'");
            $cek_mahasiswa2 = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username_mahasiswa'");
            $hasil_mahasiswa = mysqli_fetch_array($cek_mahasiswa);
            $hasil_mahasiswa2 = mysqli_fetch_array($cek_mahasiswa2);

            if (isset($hasil_mahasiswa['nim']) and isset($hasil_mahasiswa2['username']) and $hasil_mahasiswa['nim'] == $nim and $hasil_mahasiswa2['username'] == $username_mahasiswa) {
                redirect_page("Nim mahasiswa yang anda masukkan sudah ada");
            } else {
                $add_user = mysqli_query($conn, "INSERT INTO tb_user (username, password, level) VALUES ('$username_mahasiswa', '$password_mahasiswa', '$level')");

                if ($add_user) {
                    $select_user = mysqli_query($conn, "SELECT id_user FROM tb_user WHERE username = '$username_mahasiswa'");

                    if ($select_user) {
                        $hasil_user = mysqli_fetch_array($select_user);
                        $id_user = $hasil_user['id_user'];
                        $nama = $_POST['nama'];
                        $jurusan = $_POST['jurusan'];
                        $prodi = $_POST['prodi'];
                        $jenis_kelamin = $_POST['jenis_kelamin'];
                        $no_hp = $_POST['no_hp'];
                        $alamat = $_POST['alamat'];
                        $kelas = $_POST['kelas'];
                        $tgl_lahir = $_POST['tanggal_lahir'];
                        $tempat_lahir = $_POST['tempat_lahir'];
                        if (empty($_POST['dosen_pembimbing'])) {
                            $dosen_pembimbing = "1";
                        } else {
                            $dosen_pembimbing = $_POST['dosen_pembimbing'];
                        }
                        $nama_gambar_tmp = $_FILES['gambar']['name'];
                        $gambar_ada = false;

                        if (!empty($nama_gambar_tmp)) {
                            $gambar_ada = true;
                            $nama_gambar_lower_str = strtolower($nama_gambar_tmp);
                            $file_tmp = $_FILES['gambar']['tmp_name'];

                            while (true) {
                                $nama_gambar = rand(1000, 1000000) . "." . $nama_gambar_lower_str;
                                $cek_nama_gambar = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE gambar_mahasiswa = '$nama_gambar'");
                                $hasil_cek_gambar = mysqli_fetch_array($cek_nama_gambar);
                                if (isset($hasil_cek_gambar['gambar_mahasiswa']) and $hasil_cek_gambar['gambar_mahasiswa'] == $nama_gambar) {
                                    continue;
                                } else {
                                    break;
                                }
                            }
                        } else {
                            $nama_gambar = "";
                        }

                        $tambah_mahasiswa = mysqli_query(
                            $conn,
                            "INSERT INTO tb_mahasiswa(nim, id_user, nama_mahasiswa, kelas, jurusan, prodi, dosen_pembimbing, jenis_kelamin, alamat, no_hp, tgl_lahir, tempat_lahir, gambar_mahasiswa) VALUES ('$nim', '$id_user', '$nama', '$kelas', '$jurusan', '$prodi', '$dosen_pembimbing', '$jenis_kelamin', '$alamat', '$no_hp',  " . ($tgl_lahir == NULL ? "NULL" : "'$tgl_lahir'") . ", '$tempat_lahir', '$nama_gambar')"
                        );

                        if ($tambah_mahasiswa) {
                            if ($gambar_ada == true) {
                                move_uploaded_file($file_tmp, '../../images/mahasiswa/' . $nama_gambar);
                            }
                            redirect_page("Penambahan data berhasil");
                        } else {
                            echo $dosen_pembimbing;
                            echo 1;
                            redirect_page("Penambahan data gagal, mohon kontak admin");
                        }
                    } else {
                        redirect_page("Username user tidak ditemukan, mohon kontak admin");
                    }
                } else {
                    redirect_page("Data yang anda masukkan sudah ada, mohon kontak admin");
                }
            }
        } else {
            redirect_page("NIM harus diisi");
        }
    } else {
        redirect_page("Ukuran gambar melebihi 2MB, mohon kecilkan ukuran gambar");
    }
}

function hapus_data()
{
    global $conn;
    $nim = $_POST['nim'];
    $delete_mahasiswa = mysqli_query($conn, "DELETE FROM tb_mahasiswa WHERE nim = '$nim'");

    if ($delete_mahasiswa) {
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
    $nim_lama = $_POST['nim_lama'];
    $nim_baru = $_POST['nim_baru'];
    if ($nim_baru == '') {
        $nim = $nim_lama;
    } else {
        $nim = $nim_baru;
    }
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $prodi = $_POST['prodi'];
    $kelas = $_POST['kelas'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $tgl_lahir = $_POST['tanggal_lahir'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $dosen_pembimbing = $_POST['dosen_pembimbing'];
    $nama_gambar_tmp = $_FILES['gambar']['name'];
    $gambar_tidak_update = false;

    if ($nama_gambar_tmp == '') {
        $select_nama_gambar = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE nim = '$nim_lama'");
        $hasil_cek_gambar = mysqli_fetch_array($select_nama_gambar);
        $nama_gambar = $hasil_cek_gambar['gambar_mahasiswa'];
        $gambar_tidak_update = true;
    } else {
        $nama_gambar_lower_str = strtolower($nama_gambar_tmp);
        $file_tmp = $_FILES['gambar']['tmp_name'];

        while (true) {
            $nama_gambar = rand(1000, 1000000) . "." . $nama_gambar_lower_str;
            $cek_nama_gambar = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE gambar_mahasiswa = '$nama_gambar'");
            $hasil_cek_gambar = mysqli_fetch_array($cek_nama_gambar);
            if (isset($hasil_cek_gambar['gambar_mahasiswa']) and $hasil_cek_gambar['gambar_mahasiswa'] == $nama_gambar) {
                continue;
            } else {
                break;
            }
        }

        //mengambil nama file gambar lama
        $select_gambar_lama = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE nim = '$nim_lama'");
        $hasil_gambar_lama = mysqli_fetch_array($select_gambar_lama);
    }

    $update = mysqli_query(
        $conn,
        "UPDATE tb_mahasiswa SET nim='$nim',nama_mahasiswa='$nama',kelas='$kelas',jurusan='$jurusan',prodi='$prodi',dosen_pembimbing='$dosen_pembimbing',jenis_kelamin='$jenis_kelamin',alamat='$alamat',no_hp='$no_hp',tgl_lahir=  " . ($tgl_lahir == NULL ? "NULL" : "'$tgl_lahir'") . ",tempat_lahir='$tempat_lahir',gambar_mahasiswa='$nama_gambar' WHERE nim = '$nim_lama'"
    );

    if ($update) {
        if (isset($hasil_gambar_lama['gambar_mahasiswa']) and !empty($hasil_gambar_lama['gambar_mahasiswa'])) {
            unlink('../../images/mahasiswa/' . $hasil_gambar_lama['gambar_mahasiswa']);
        }
        if ($gambar_tidak_update == false) {
            move_uploaded_file($file_tmp, '../../images/mahasiswa/' . $nama_gambar);
        }
        redirect_page("Data berhasil diedit");
    } else {
        redirect_page("Data gagal diedit, mohon kontak mahasiswa");
    }
}