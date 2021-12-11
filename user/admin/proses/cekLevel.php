<?php
session_start();

if ($_SESSION['level'] != 'admin') {
    echo '<script>window.location="../logout.php";</script>';
}