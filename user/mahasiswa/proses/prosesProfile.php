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
        $cek_nama_gambar = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE gambar_mahasiswa = '$nama_gambar'");
        $hasil_cek_gambar = mysqli_fetch_array($cek_nama_gambar);

        if (isset($hasil_cek_gambar['gambar_mahasiswa']) and $hasil_cek_gambar['gambar_mahasiswa'] == $nama_gambar) {
            continue;
        } else {
            break;
        }
    }

    //mengambil nama file gambar lama
    $select_gambar_lama = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE id_user = '$id_user'");
    $hasil_gambar_lama = mysqli_fetch_array($select_gambar_lama);

    $update = mysqli_query($conn, "UPDATE tb_mahasiswa SET gambar_mahasiswa = '$nama_gambar' WHERE id_user = '$id_user'");

    if ($update) {
        unlink('../../images/mahasiswa/' . $hasil_gambar_lama['gambar_mahasiswa']);
        move_uploaded_file($file_tmp, '../../images/mahasiswa/' . $nama_gambar);
        redirect_page("Gambar berhasil diganti", "prof");
    } else {
        redirect_page("Gambar gagal diganti, mohon kontak admin", "prof");
    }
}

function edit_profile()
{
    global $conn;
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $prodi = $_POST['prodi'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $kelas = $_POST['kelas'];

    $update = mysqli_query(
        $conn,
        "UPDATE tb_mahasiswa SET nama_mahasiswa='$nama',
        kelas='$kelas',jurusan='$jurusan',prodi='$prodi',jenis_kelamin='$jenis_kelamin',
        alamat='$alamat',no_hp='$no_hp',
        tgl_lahir='$tanggal_lahir',tempat_lahir='$tempat_lahir' WHERE nim='$nim'"
    );

    if ($update) {
        redirect_page("Data berhasil diedit", "prof");
    } else {
        redirect_page("Data gagal diedit, mohon kontak mahasiswa", "prof");
    }
}