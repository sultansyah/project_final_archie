<?php
if (empty($_SESSION['username'])) {
    echo '<script>window.location="../sign-in";</script>';
}