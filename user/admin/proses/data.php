<?php
require "../koneksi.php";

$select_data = mysqli_query(
    $conn,
    "SELECT * FROM tb_user USR
    LEFT JOIN tb_admin TA ON USR.id_user = TA.id_user
    WHERE USR.username = '$_SESSION[username]'
"
);

$hasil_data = mysqli_fetch_array($select_data);
$gambar = "../images/admin/" . $hasil_data['gambar_admin'];