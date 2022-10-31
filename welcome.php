<?php
// Memulai session
session_start();

    // Check user, jika user belum login maka akan diarahkan ke halaman login.php
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container bg-primary text-white rounded-pill py-2 mt-5 text-center">
        <div>
            <h1 class="my-5 fs-2">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Selamat datang pada website kami.</h1>
        </div>
        <div class="mb-5">
                <a href="logout.php" class="btn btn-danger">LOGOUT ACCOUNT</a>
        </div>
    </div>
</body>
</html>