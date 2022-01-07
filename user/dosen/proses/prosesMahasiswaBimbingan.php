<?php
require "../../koneksi.php";
require "../../func.php";

if (isset($_POST['hapus'])) {
    hapus_data();
} else {
    redirect_page("Mohon masuk ke halaman data mahasiswa terlebih dahulu", "mb");
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
            redirect_page("Penghapusan data berhasil", "mb");
        } else {
            redirect_page("Proses penghapusan gagal, mohon kontak ambin", "mb");
        }
    } else {
        redirect_page("Proses penghapusan gagal, mohon kontak ambin", "mb");
    }
}