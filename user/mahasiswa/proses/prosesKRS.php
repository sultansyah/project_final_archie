<?php
require "../../koneksi.php";
require "../../func.php";

if (isset($_POST['tambah'])) {
    tambah_data();
} elseif (isset($_POST['print'])) {
    print_krs();
} elseif (isset($_GET['edit'])) {
    edit_data();
} else {
    redirect_page("Mohon masuk ke halaman data jadwal pertemuan terlebih dahulu", "krs");
}

function tambah_data()
{
    global $conn;
    $nim = $_POST['nim'];
    $dosen_pembimbing = $_POST['dosen_pembimbing'];
    $semester = $_POST['semester'];
    $kelas = $_POST['kelas'];

    //ambil file krs
    $berkas_type = $_FILES['berkas_krs']['type'];
    if ($berkas_type == "application/pdf") {
        $berkas_tmp = $_FILES['berkas_krs']['tmp_name'];
    } else {
        redirect_page("Tipe yang diterima hanya pdf", "krs");
    }

    $nama_berkas_tmp = $_FILES['berkas_krs']['name'];
    $nama_berkas_lower_str = strtolower($nama_berkas_tmp);

    while (true) {
        $nama_berkas = rand(1000, 1000000) . "." . $nama_berkas_lower_str;
        $cek_nama_berkas = mysqli_query($conn, "SELECT * FROM tb_krs WHERE berkas_krs = '$nama_berkas'");
        $hasil_cek_berkas = mysqli_fetch_array($cek_nama_berkas);
        if (isset($hasil_cek_berkas['berkas_krs']) and $hasil_cek_berkas['berkas_krs'] == $nama_berkas) {
            continue;
        } else {
            break;
        }
    }

    move_uploaded_file($berkas_tmp, '../../krs/' . $nama_berkas);

    // $tambah = mysqli_query(
    //     $conn,
    //     "INSERT INTO tb_krs(nim_mahasiswa, dosen_pembimbing, semester, kelas, status, berkas_krs, tanda_tangan) 
    //         VALUES ('$nim','$dosen_pembimbing','$semester','$kelas','1','$nama_berkas','')"
    // );

    $tambah = mysqli_query(
        $conn,
        "INSERT INTO tb_krs(nim_mahasiswa, dosen_pembimbing, semester, kelas, status, berkas_krs) 
            VALUES ('$nim','$dosen_pembimbing','$semester','$kelas','1','$nama_berkas')"
    );

    if ($tambah) {
        redirect_page("Tambah krs berhasil", "krs");
    } else {
        redirect_page("Tambah krs gagal, mohon kontak admin", "krs");
    }
}

function edit_data()
{
    global $conn;
    $nim = $_POST['nim'];
    $semester = $_POST['semester'];
    $kelas = $_POST['kelas'];
    $dosen_pembimbing = $_POST['dosen_pembimbing'];

    //ambil file krs
    if (isset($_FILES['berkas_krs']['name'])) {
        $nama_berkas_tmp = $_FILES['berkas_krs']['name'];
        $berkas_type = $_FILES['berkas_krs']['type'];
        if ($berkas_type == "application/pdf") {
            $berkas_tmp = $_FILES['berkas_krs']['tmp_name'];
        } else {
            redirect_page("Tipe yang diterima hanya pdf", "krs");
        }

        $nama_berkas_lower_str = strtolower($nama_berkas_tmp);

        while (true) {
            $nama_berkas = rand(1000, 1000000) . "." . $nama_berkas_lower_str;
            $cek_nama_berkas = mysqli_query($conn, "SELECT * FROM tb_krs WHERE berkas_krs = '$nama_berkas'");
            $hasil_cek_berkas = mysqli_fetch_array($cek_nama_berkas);
            if (isset($hasil_cek_berkas['berkas_krs']) and $hasil_cek_berkas['berkas_krs'] == $nama_berkas) {
                continue;
            } else {
                break;
            }
        }

        move_uploaded_file($berkas_tmp, '../../krs/' . $nama_berkas);
    } else {
        $select_berkas = mysqli_query($conn, "SELECT * FROM tb_krs WHERE nim_mahasiswa = '$nim'");
        $hasil_berkas = mysqli_fetch_array($select_berkas);
        $nama_berkas = $hasil_berkas['berkas_krs'];
    }

    $tambah = mysqli_query(
        $conn,
        "UPDATE tb_krs SET dosen_pembimbing='$dosen_pembimbing',
        semester='$semester',kelas='$kelas',berkas_krs='$nama_berkas' WHERE nim_mahasiswa='$nim'"
    );

    if ($tambah) {
        redirect_page("Edit krs berhasil", "krs");
    } else {
        redirect_page("Edit krs gagal, mohon kontak admin", "krs");
    }
}

function print_krs()
{
}

//tidak dipakek
// function detail()
// {
//     $your_file_name = "447687.soal ujian aljabar linier perbaikan.pdf";

//     //Content type and this case its a PDF
//     header("Content-type: application/pdf");

//     header("Content-Length: " . filesize($your_file_name));

//     //Display the file
//     readfile($your_file_name);
// }