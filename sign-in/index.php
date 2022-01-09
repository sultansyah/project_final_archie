<?php
session_start();
if (isset($_SESSION['username'])) {
    if ($_SESSION['level'] == 'admin') {
        echo '<script>window.location="../user/admin/";</script>';
    } else if ($_SESSION['level'] == 'dosen') {
        echo '<script>window.location="../user/dosen/";</script>';
    } else if ($_SESSION['level'] == 'mahasiswa') {
        echo '<script>window.location="../user/mahasiswa/";</script>';
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Signin Template · Bootstrap v5.1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
    </style>

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

</head>

<body class="text-center">

    <main class="form-signin">
        <form action="proses_signin.php" method="POST">
            <img class="mb-4" src="" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Sign in</h1>

            <div class="form-floating mb-2">
                <input type="text" class="form-control" name="username" id="floatingInput" placeholder="Username"
                    autofocus>
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" id="floatingPassword"
                    placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <input type="submit" class="w-100 btn btn-lg btn-primary" value="Login">
        </form>
    </main>

</body>

</html>