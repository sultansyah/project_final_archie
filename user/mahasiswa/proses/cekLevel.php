<?php
session_start();

if ($_SESSION['level'] != 'mahasiswa') {
    echo '<script>window.location="../logout.php";</script>';
}