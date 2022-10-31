<?php
require "koneksi.php";

// Membuat variabel dengan value kosong
$username = $password = $email ="";
$username_err = $password_err = $email_err= "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Username harus di isi.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        // membuat validasi dengan Regex
        $username_err = "Username hanya boleh berisi huruf,angka, dan underscore";
    } else{

        //Prepare statement
        $sql = "SELECT id_user FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variable ke prepare statement sebagai params
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Check prepare statement pada saat di execute
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Username sudah ada";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Ada beberapa error. Coba lagi!";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

            // Validate password
        if(empty(trim($_POST["password"]))){
            $password_err = "Please enter a password.";
        } elseif(strlen(trim($_POST["password"])) < 6){
            $password_err = "Password must have atleast 6 characters.";
        } else{
            $password = trim($_POST["password"]);
        }

        // Validate email
        if(empty(trim($_POST["email"]))){
            $email_err = "Please enter a email.";
        } elseif(strlen(trim($_POST["email"])) < 6){
            $email_err = "email must have atleast 6 characters.";
        } else{
            $email = trim($_POST["email"]);
        }

    // Check input error, jika tidak ada error maka akan melakukan inserting pada database
    if(empty($username_err) && empty($password_err) && empty($email_err)){


        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        if($stmt = mysqli_prepare($conn, $sql)){

            $bind =  mysqli_stmt_bind_param($stmt, "sss", $params_username, $param_email, $param_password);

            $param_email = $email;
            $params_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Membuat enkripsi password agar lebih aman

            if(mysqli_stmt_execute($stmt)){
                header("location: index.php?success");
            } else{
                echo "DEBUG ERROR: " . mysqli_error($conn);
                echo "Oops! Gagal insert ke database!";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register GuhCoding</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto">

                <p>&larr; <a href="index.php">Home</a>

                    <h4>Bergabunglah bersama ribuan orang lainnya...</h4>
                    <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

                        <div class="form-group mb-2">
                            <label for="username">Username</label>
                            <input class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" type="text" name="username" placeholder="Username" value="<?php echo $username; ?>"/>
                            <span class="invalid-feedback"><?php echo $username_err; ?></span>
                        </div>

                        <div class="form-group mb-2">
                            <label for="email">Email</label>
                            <input class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" type="email" name="email" placeholder="Alamat Email" value="<?php echo $email; ?>"/>
                            <span class="invalid-feedback"><?php echo $email_err; ?></span>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" type="password" name="password" placeholder="Password" value="<?php echo $password; ?>"/>
                            <span class="invalid-feedback"><?php echo $password_err; ?></span>
                        </div>

                        <input type="submit" class="btn btn-success btn-block mt-2" name="register" value="Daftar" />

                    </form>

            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>