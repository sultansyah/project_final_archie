<?php
require_once "../../func.php";
if ($_GET['nama_pdf'] == "") {
    echo '<script>alert("Berkas PDF belum ada");</script>';
    $hapus = true;
} else {
    $nama_pdf = $_GET['nama_pdf'];
    $path_pdf = "../../krs/" . $nama_pdf;

    //Content type and this case its a PDF
    header("Content-type: application/pdf");

    header("Content-Length: " . filesize($path_pdf));

    //Display the file
    readfile($path_pdf);
}

if ($hapus) {
    delete_tab();
}