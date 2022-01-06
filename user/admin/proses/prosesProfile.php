<?php
require "../../koneksi.php";
require "../../func.php";

if (isset($_POST['ganti_gambar'])) {
    ganti_gambar();
} elseif (isset($_POST['edit_profile'])) {
    edit_profile();
} else {
    redirect_page("Mohon masuk ke halaman profile terlebih dahulu", "prof");
}

function ganti_gambar()
{
    global $conn;
    $id_user = $_POST['id_user'];
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

    //mengambil nama file gambar lama
    $select_gambar_lama = mysqli_query($conn, "SELECT * FROM tb_admin WHERE id_user = '$id_user'");
    $hasil_gambar_lama = mysqli_fetch_array($select_gambar_lama);

    $update = mysqli_query($conn, "UPDATE tb_admin SET gambar_admin = '$nama_gambar' WHERE id_user = '$id_user'");

    if ($update) {
        unlink('../../images/admin/' . $hasil_gambar_lama['gambar_admin']);
        move_uploaded_file($file_tmp, '../../images/admin/' . $nama_gambar);
        redirect_page("Gambar berhasil diganti", "prof");
    } else {
        redirect_page("Gambar gagal diganti, mohon kontak admin", "prof");
    }
}

function edit_profile()
{
    global $conn;
    $kode_admin = $_POST['kode_admin'];
    $nama = $_POST['nama'];
    $tempat_kerja = $_POST['tempat_kerja'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

    $update = mysqli_query($conn, "UPDATE tb_admin SET nama_admin='$nama', tempat_kerja='$tempat_kerja', jenis_kelamin='$jenis_kelamin', no_hp='$no_hp', alamat='$alamat' WHERE kode_admin = '$kode_admin'");

    if ($update) {
        redirect_page("Data berhasil diedit", "prof");
    } else {
        redirect_page("Data gagal diedit, mohon kontak admin", "prof");
    }
}