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
        $cek_nama_gambar = mysqli_query($conn, "SELECT * FROM tb_dosen WHERE gambar_dosen = '$nama_gambar'");
        $hasil_cek_gambar = mysqli_fetch_array($cek_nama_gambar);

        if (isset($hasil_cek_gambar['gambar_dosen']) and $hasil_cek_gambar['gambar_dosen'] == $nama_gambar) {
            continue;
        } else {
            break;
        }
    }

    //mengambil nama file gambar lama
    $select_gambar_lama = mysqli_query($conn, "SELECT * FROM tb_dosen WHERE id_user = '$id_user'");
    $hasil_gambar_lama = mysqli_fetch_array($select_gambar_lama);

    $update = mysqli_query($conn, "UPDATE tb_dosen SET gambar_dosen = '$nama_gambar' WHERE id_user = '$id_user'");

    if ($update) {
        unlink('../../images/dosen/' . $hasil_gambar_lama['gambar_dosen']);
        move_uploaded_file($file_tmp, '../../images/dosen/' . $nama_gambar);
        redirect_page("Gambar berhasil diganti", "prof");
    } else {
        redirect_page("Gambar gagal diganti, mohon kontak admin", "prof");
    }
}

function edit_profile()
{
    global $conn;
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $prodi = $_POST['prodi'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

    $update = mysqli_query($conn, "UPDATE tb_dosen SET nama_dosen='$nama', jurusan='$jurusan', prodi='$prodi' ,jenis_kelamin='$jenis_kelamin', no_hp='$no_hp', alamat='$alamat' WHERE nip = '$nip'");

    if ($update) {
        redirect_page("Data berhasil diedit", "prof");
    } else {
        redirect_page("Data gagal diedit, mohon kontak dosen", "prof");
    }
}