<?php
require "../../koneksi.php";
require "../../func.php";

if (isset($_POST['tambah'])) {
    tambah_data();
} elseif (isset($_POST['edit'])) {
    edit_data();
} elseif (isset($_POST['hapus'])) {
    hapus_data();
} else {
    redirect_page("Mohon masuk ke halaman data jadwal pertemuan terlebih dahulu", "djp");
}

function tambah_data()
{
    global $conn;
    $judul = $_POST['judul'];

    if (empty($judul)) {
        redirect_page("Judul harus diisi", "djp");
    } else {
        $keterangan = $_POST['keterangan'];
        $kategori = $_POST['kategori'];
        $tanggal_jam = $_POST['tanggal_jam'];
        $id_user_pembuat = $_POST['id_user_pembuat'];
        $level_pembuat = $_POST['level_pembuat'];

        $tambah = mysqli_query($conn, "INSERT INTO tb_jadwal_pertemuan(judul, keterangan, kategori, tanggal_jam, id_user_pembuat, level_pembuat)  VALUES ('$judul','$keterangan','$kategori',  " . ($tanggal_jam == NULL ? "NULL" : "'$tanggal_jam'") . ",'$id_user_pembuat', '$level_pembuat')");

        if ($tambah) {
            redirect_page("Tambah jadwal berhasil", "djp");
        } else {
            redirect_page("Tambah jadwal gagal, mohon kontak admin", "djp");
        }
    }
}

function hapus_data()
{
    global $conn;
    $id_jadwal = $_POST['id_jadwal'];

    $hapus = mysqli_query($conn, "DELETE FROM tb_jadwal_pertemuan WHERE id_jadwal = '$id_jadwal'");

    if ($hapus) {
        redirect_page("Hapus jadwal berhasil", "djp");
    } else {
        redirect_page("Hapus jadwal gagal, mohon kontak admin", "djp");
    }
}

function edit_data()
{
    global $conn;
    $id_jadwal = $_POST['id_jadwal'];
    $judul = $_POST['judul'];
    $keterangan = $_POST['keterangan'];
    $kategori = $_POST['kategori'];
    $tanggal_jam = $_POST['tanggal_jam'];
    $id_user_pengedit = $_POST['id_user_pengedit'];
    $level_pengedit = $_POST['level_pengedit'];

    $update = mysqli_query($conn, "UPDATE tb_jadwal_pertemuan SET judul='$judul',keterangan='$keterangan',kategori='$kategori',tanggal_jam='$tanggal_jam',id_user_pengedit='$id_user_pengedit',level_pengedit='$level_pengedit' WHERE id_jadwal = '$id_jadwal'");

    if ($update) {
        redirect_page("Edit jadwal berhasil", "djp");
    } else {
        redirect_page("Edit jadwal gagal, mohon kontak admin", "djp");
    }
}