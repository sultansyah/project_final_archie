<?php

//function untuk menampilkan alert dan mendirect ke halaman data admin
function redirect_page($message, $url)
{
    echo '<script>alert("' . $message . '");</script>';
    echo '<script>window.location="../' . $url . '";</script>';
}

function delete_tab()
{
    echo "<script>window.close();</script>";
}