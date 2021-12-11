<?php
require "../user/koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' and password ='$password'");
$row = mysqli_fetch_array($query);

if ($query) {
    if (isset($row['username']) && isset($row['password']) && $row['username'] == $username && $row['password'] == $password) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['level'] = $row['level'];

        if ($row['level'] == 'admin') {
            echo '<script>window.location="../user/admin/";</script>';
        } elseif ($row['level'] == 'dosen') {
            echo '<script>window.location="../user/dosen/";</script>';
        } elseif ($row['level'] == 'mahasiswa') {
            echo '<script>window.location="../user/mahasiswa/";</script>';
        }
    } else {
        echo '<script>alert("Mohon maaf username atau password yang anda masukkan salah");</script>';
        echo '<script>window.location="../sign-in";</script>';
    }
}