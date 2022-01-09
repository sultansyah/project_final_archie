<?php
require "../koneksi.php";

$select_data = mysqli_query(
    $conn,
    "SELECT * FROM tb_user USR
    LEFT JOIN tb_mahasiswa MHS ON USR.id_user = MHS.id_user
    WHERE USR.username = '$_SESSION[username]'
"
);

$hasil_data = mysqli_fetch_array($select_data);
$gambar = "../images/mahasiswa/" . $hasil_data['gambar_mahasiswa'];