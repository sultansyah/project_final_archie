<?php
require "../../koneksi.php";
require "../../func.php";

if (isset($_POST['tambah'])) {
    tambah_data();
} elseif (isset($_POST['edit'])) {
    edit_data();
} elseif (isset($_POST['acc'])) {
    acc();
} elseif (isset($_POST['tolak'])) {
    tolak();
} elseif (isset($_POST['link'])) {
    link_tujuan();
} else {
    redirect_page("Mohon masuk ke halaman data jadwal pertemuan terlebih dahulu", "jp");
}

function tambah_data()
{
    global $conn;
    $judul = $_POST['judul'];

    if (empty($judul)) {
        redirect_page("Judul harus diisi", "jp");
    } else {
        $keterangan = $_POST['keterangan'];
        $kategori = $_POST['kategori'];
        $tanggal_jam = $_POST['tanggal_jam'];
        $mahasiswa = $_POST['mahasiswa'];
        $id_user_pembuat = $_POST['id_user_pembuat'];
        $level_pembuat = $_POST['level_pembuat'];

        $tambah = mysqli_query($conn, "INSERT INTO tb_jadwal_pertemuan(judul, keterangan, mahasiswa, kategori, tanggal_jam, id_user_pembuat, level_pembuat)  VALUES ('$judul','$keterangan','$mahasiswa','$kategori',  " . ($tanggal_jam == NULL ? "NULL" : "'$tanggal_jam'") . ",'$id_user_pembuat', '$level_pembuat')");

        if ($tambah) {
            redirect_page("Tambah jadwal berhasil", "jp");
        } else {
            redirect_page("Tambah jadwal gagal, mohon kontak admin", "jp");
        }
    }
}

function edit_data()
{
    global $conn;
    $id_jadwal = $_POST['id_jadwal'];
    $judul = $_POST['judul'];
    $keterangan = $_POST['keterangan'];
    $kategori = $_POST['kategori'];
    $mahasiswa = $_POST['mahasiswa'];
    $tanggal_jam = $_POST['tanggal_jam'];
    $id_user_pengedit = $_POST['id_user_pengedit'];
    $level_pengedit = $_POST['level_pengedit'];

    $update = mysqli_query($conn, "UPDATE tb_jadwal_pertemuan SET judul='$judul',keterangan='$keterangan', mahasiswa='$mahasiswa',kategori='$kategori',tanggal_jam='$tanggal_jam',id_user_pengedit='$id_user_pengedit',level_pengedit='$level_pengedit' WHERE id_jadwal = '$id_jadwal'");

    if ($update) {
        redirect_page("Edit jadwal berhasil", "jp");
    } else {
        redirect_page("Edit jadwal gagal, mohon kontak admin", "jp");
    }
}

function acc()
{
    global $conn;
    $id_jadwal = $_POST['id_jadwal'];

    $update = mysqli_query($conn, "UPDATE tb_jadwal_pertemuan SET status = 2 WHERE id_jadwal = '$id_jadwal'");

    if ($update) {
        redirect_page("ACC berhasil, link akan dikirimkam 1 jam sebelum jadwal pertemuan", "jp");
    } else {
        redirect_page("Terjadi masalah, mohon kontak admin", "jp");
    }
}

function tolak()
{
    global $conn;
    $id_jadwal = $_POST['id_jadwal'];

    $update = mysqli_query($conn, "UPDATE tb_jadwal_pertemuan SET status=3 WHERE id_jadwal = '$id_jadwal'");

    if ($update) {
        redirect_page("Tolak berhasil", "jp");
    } else {
        redirect_page("Terjadi masalah, mohon kontak admin", "jp");
    }
}

function link_tujuan()
{
    global $conn;
    $id_jadwal = $_POST['id_jadwal'];

    if ($_POST['ada/belum'] == "ada") {
        $select_zoom = mysqli_query($conn, "SELECT * FROM tb_jadwal_pertemuan WHERE id_jadwal = '$id_jadwal'");
        $hasil_zoom = mysqli_fetch_array($select_zoom);

        echo '<script>alert("Meeting Password: ' . $hasil_zoom['password_meet'] . '");</script>';
        echo '<script>window.location="' . $hasil_zoom['link_meet'] . '";</script>';
    } elseif ($_POST['ada/belum'] == "belum") {
        require "../../../zoom/makeMeetingZoom.php";
        require_once "../../../vendor/autoload.php";

        $random_password = rand(0, 100000);
        $durasi = $_POST['durasi'];

        if (isset($_POST['judul'])) $judul = $_POST['judul'];
        else redirect_page("Judul belum ada", "jp");

        if (isset($_POST['tanggal_jam'])) $tanggal_jam = $_POST['tanggal_jam'];
        else redirect_page("tanggal dan jam pertemuan belum ada", "jp");

        $data_zoom = createZoomMeeting($judul, $tanggal_jam, $random_password, $durasi);

        $insert = mysqli_query($conn, "UPDATE tb_jadwal_pertemuan SET link_meet = '$data_zoom->join_url', password_meet = '$data_zoom->password' WHERE id_jadwal = '$id_jadwal'");
        if ($insert) {
            echo '<script>alert("Link zoom sudah dikirim ke mahasiswa");</script>';
        } else {
            redirect_page("Terjadi kesalahan, mohon kontak admin", "jp");
        }

        echo '<script>alert("Meeting Password: ' . $data_zoom->password . '");</script>';
        echo '<script>window.location="' . $data_zoom->join_url . '";</script>';
    }
}