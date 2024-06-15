<?php
session_start();
include('includes/config.php');

// Handle user registration
if(isset($_POST['register'])) {
    $uname = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encrypting password
    $email = $_POST['email']; // Add email from form input
    
    // Check if username already exists using prepared statement
    $check_query = "SELECT AdminUserName FROM tbladmin WHERE AdminUserName=?";
    $stmt = mysqli_prepare($con, $check_query);
    mysqli_stmt_bind_param($stmt, "s", $uname);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    
    if(mysqli_stmt_num_rows($stmt) > 0) {
        echo "<script>alert('Username already exists');</script>";
    } else {
        // Insert new user using prepared statement
        $insert_query = "INSERT INTO tbladmin (AdminUserName, AdminPassword, AdminEmailId, Is_Active) VALUES (?, ?, ?, 1)";
        $insert_stmt = mysqli_prepare($con, $insert_query);
        mysqli_stmt_bind_param($insert_stmt, "sss", $uname, $password, $email);
        
        if(mysqli_stmt_execute($insert_stmt)) {
            echo "<script>alert('Registration successful');</script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again.');</script>";
            // Uncomment line below for debugging purposes
            // echo "Error: " . mysqli_error($con);
        }
    }
}

// Handle user login
if(isset($_POST['login'])) {
    $uname = $_POST['username'];
    $password = $_POST['password'];
    
    // Fetch data from database on the basis of username using prepared statement
    $login_query = "SELECT AdminUserName, AdminPassword FROM tbladmin WHERE AdminUserName=?";
    $stmt = mysqli_prepare($con, $login_query);
    mysqli_stmt_bind_param($stmt, "s", $uname);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    
    if(mysqli_stmt_num_rows($stmt) > 0) {
        mysqli_stmt_bind_result($stmt, $db_username, $db_password);
        mysqli_stmt_fetch($stmt);
        
        // Verifying Password
        if (password_verify($password, $db_password)) {
            $_SESSION['login'] = $db_username;
            echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
            exit;
        } else {
            echo "<script>alert('Wrong Password');</script>";
        }
    } else {
        // If username not found in database
        echo "<script>alert('User not registered with us');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="News Portal.">
    <meta name="author" content="PHPGurukul">

    <title>Guminyus | Admin Panel</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

    <script src="assets/js/modernizr.min.js"></script>

    <style>
        .form-text {
            margin-top: 90px;
        }

        .account-btn {
            margin-bottom: 20px;
        }

        .btn-login {
            padding: 8px 20px; /* Sesuaikan padding agar sesuai */
            border-radius: 15px; /* Membuat tombol berbentuk oval */
            font-size: 14px; /* Sesuaikan ukuran font */
            line-height: 1.5; /* Sesuaikan line-height agar sesuai */
        }

        .btn-login {
            background-color: #000; /* Warna latar belakang hitam */
            border-color: #000; /* Warna border hitam */
            color: #fff; /* Warna teks putih */
        }
    </style>
</head>

<body class="bg-transparent">

    <section>
        <div class="container-alt">
            <div class="row">
                <div class="col-sm-12">
                    <div class="wrapper-page">
                        <div class="m-t-40 account-pages">
                            <div class="text-center account-logo-box">
                                <h2 class="text-uppercase">
                                    <a href="index.html" class="text-success">
                                        <span><img src="assets/images/hitam.png" alt="" height="56"></span>
                                    </a>
                                </h2>
                            </div>
                            <div class="account-content">
                                <!-- Login Form -->
                                <div id="loginForm">
                                    <form class="form-horizontal" method="post">
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <input class="form-control" type="text" required="" name="username" placeholder="Username" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <input class="form-control" type="password" name="password" required="" placeholder="Password" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group account-btn text-center m-t-10">
                                            <div class="col-xs-12">
                                                <button class="btn w-md btn-bordered btn-danger waves-effect waves-light btn-login" type="submit" name="login">Log In</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="text-center form-text">
                                        <p>Belum punya akun? <a href="#" id="showRegisterForm">Silahkan register</a></p>
                                    </div>
                                </div>

                                <!-- Register Form -->
                                <div id="registerForm" style="display: none;">
                                    <form class="form-horizontal m-t-20" method="post">
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <input class="form-control" type="text" required="" name="username" placeholder="Username" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <input class="form-control" type="email" required="" name="email" placeholder="Email" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <input class="form-control" type="password" required="" name="password" placeholder="Password" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group account-btn text-center m-t-10">
                                            <div class="col-xs-12">
                                                <button class="btn w-md btn-bordered btn-primary waves-effect waves-light" type="submit" name="register">Register</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="text-center form-text">
                                        <p>Sudah punya akun? <a href="#" id="showLoginForm">Silahkan login</a></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- end card-box-->
                    </div>
                    <!-- end wrapper -->
                </div>
            </div>
        </div>
    </section>
    <!-- END HOME -->

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.blockUI.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>

    <!-- App js -->
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>

    <script>
        document.getElementById('showRegisterForm').addEventListener('click', function(event) {
            event.preventDefault(); // Hindari aksi default dari tautan
            document.getElementById('loginForm').style.display = 'none';
            document.getElementById('registerForm').style.display = 'block';
        });

        document.getElementById('showLoginForm').addEventListener('click', function(event) {
            event.preventDefault(); // Hindari aksi default dari tautan
            document.getElementById('registerForm').style.display = 'none';
document.getElementById('loginForm').style.display = 'block';
});
</script>

</body>
</html>
