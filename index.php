<?php

    // Menangkap pesan sukses registrasi melalui URL
    if (isset($_GET['success'])) {
        $message = "Pendaftaran Berhasil";
    }
    // Menangkap pesan logout melalui URL
    if (isset($_GET['logout'])) {
        $message = "Berhasil Logout Dari Akun";
    }
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <div class="container">
    <div class="bg-success rounded mt-4 text-center text-uppercase" style="--bs-bg-opacity: .5;">
        <p class="fs-2 text-white"><?php echo $message; ?></p>
    </div>
        <div class="mx-auto mt-3 p-2 bg-light rounded">
            <div class="text-main text-center">
                <p class="fs-2">Selamat datang di website GuhCoding.com</p>
                <p>Silahkan daftar jika anda belum
                    mempunyai akun</p>
            </div>
            <div class="button-main text-center">
                <a href="login.php" class="btn btn-outline-success">Login</a>
                <a href="register.php" class="btn btn-outline-secondary">Daftar</a>
            </div>
            <div class="row">
                <div class="col-md-6 mx-auto mt-2 mb-3">
                    <img src="https://i.postimg.cc/SQz047XG/4782264.jpg" class="img-thumbnail" alt="https://www.freepik.com/vectors/multimedia-background">
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>