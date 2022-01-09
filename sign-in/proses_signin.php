<?php
require "../user/koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' and password ='$password'");
$row = mysqli_fetch_array($query);

if ($query) {
    if ($row['username'] == $username && $row['password'] == $password) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['level'] = $row['level'];

        if ($row['level'] == 'admin') {
            $nama = nama("admin", $row['id_user']);
            $_SESSION['nama'] = $nama;
            echo '<script>window.location="../user/admin/";</script>';
        } elseif ($row['level'] == 'dosen') {
            $nama = nama("dosen", $row['id_user']);
            $_SESSION['nama'] = $nama;
            echo '<script>window.location="../user/dosen/";</script>';
        } elseif ($row['level'] == 'mahasiswa') {
            $nama = nama("mahasiswa", $row['id_user']);
            $_SESSION['nama'] = $nama;
            echo '<script>window.location="../user/mahasiswa/";</script>';
        }
    } else {
        echo '<script>alert("Mohon maaf username atau password yang anda masukkan salah");</script>';
        echo '<script>window.location="../sign-in";</script>';
    }
}

function nama($level, $id_user)
{
    global $conn;
    $tb = "tb_" . $level;
    $select = mysqli_query($conn, "SELECT * FROM $tb WHERE id_user = '$id_user'");
    $hasil = mysqli_fetch_array($select);
    $nama = "nama_" . $level;
    return $hasil[$nama];
}