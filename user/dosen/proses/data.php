<?php
require "../koneksi.php";

$select_data = mysqli_query(
    $conn,
    "SELECT * FROM tb_user USR
    LEFT JOIN tb_dosen TD ON USR.id_user = TD.id_user
    WHERE USR.username = '$_SESSION[username]'
"
);

$hasil_data = mysqli_fetch_array($select_data);
$gambar = "../images/dosen/" . $hasil_data['gambar_dosen'];