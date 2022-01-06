<?php
require "../../koneksi.php";
require "../../func.php";
session_start();

if (isset($_POST['ganti_password'])) {
    ganti_password();
} else {
    redirect_page("Mohon masuk ke halaman profile terlebih dahulu", "set");
}

function ganti_password()
{
    global $conn;
    $id_user = $_POST['id_user'];
    $username_lama = $_POST['usernamelama'];
    $username_baru = $_POST['usernamebaru'];
    $password_lama = $_POST['passwordlama'];
    $ulang_password_lama = md5($_POST['upasswordlama']);
    $password_baru = md5($_POST['passwordbaru']);

    if ($username_baru != $username_lama) {
        if ($password_lama == $ulang_password_lama) {
            if ($password_baru != $password_lama) {
                $update = mysqli_query($conn, "UPDATE tb_user SET username = '$username_baru', password = '$password_baru' WHERE id_user = '$id_user'");

                if ($update) {
                    $_SESSION['username'] = $username_baru;

                    if (!empty($username_baru) and !empty($password_baru)) {
                        redirect_page("Penggantian username dan password berhasil", "set");
                    } else if (!empty($username_baru)) {
                        redirect_page("Penggantian username berhasil", "set");
                    } else if (!empty($password_baru)) {
                        redirect_page("Penggantian password berhasil", "set");
                    }
                } else {
                    redirect_page("Terjadi kesalahan saat melakukan proses penggantian password, mohon kontak admin", "set");
                }
            } else {
                redirect_page("Password baru yang anda sama dengan password lama, mohon masukkan yang berbeda", "set");
            }
        } else {
            redirect_page("Password lama yang anda masukkan tidak sama dengan password anda yang dulu", "set");
        }
    } else {
        redirect_page("username baru yang anda masukkan sama dengan username lama, mohon masukksan username yang berbeda", "set");
    }
}