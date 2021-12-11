<?php
session_start();

if ($_SESSION['level'] != 'dosen') {
    echo '<script>window.location="../logout.php";</script>';
}