<?php
session_start();

if (empty($_GET['x']) or empty($_SESSION['username'])) {
    echo "<script>window.location='sign-in';</script>";
} else {
    echo '<script>alert("Website sedang bermasalah, mohon kontak admin");</script>';
}

// error karena routing pakek banyak folder saya tidak tau caranya
// jadi saya memakai routing di tiap folder, moga tahun depan saya paham