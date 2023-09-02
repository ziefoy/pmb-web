<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    // cek akun di db
    $cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username='" . htmlspecialchars($_POST['username']) . "' AND password='" . md5(htmlspecialchars($_POST['password'])) . "'");

    if (mysqli_num_rows($cek) > 0) {
        $data_login = mysqli_fetch_object($cek);

        $_SESSION['status_login'] = true;
        $_SESSION['id'] = $data_login->id;
        $_SESSION['nama'] = $data_login->nama;

        echo '<script>window.location="beranda.php"</script>';
    } else {
        echo '<script>alert("Username atau Password salah!")</script>';
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




    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

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
    <link href="css/signin.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin">
        <form action="" method="post">
            <img class="mb-4" src="img/logo.png" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Login</h1>

            <div class="form-floating mb-2">
                <input type="text" class="form-control" id="username" name="username">
                <label for="username">Username</label>
            </div>
            <div class="form-floating mb-2">
                <input type="password" class="form-control" id="password" name="password">
                <label for="password">Password</label>
            </div>


            <input class="w-100 btn btn-lg btn-primary" type="submit" name="login" value="Sign in">
            <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
        </form>
    </main>



</body>

</html>