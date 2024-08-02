<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/css/admin-login.css">
</head>
<?php

session_start();
ob_start();
include "../../model/pdo.php";
include "../../model/taikhoan.php";
if (isset($_POST['login']) && ($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $checkuser = checkuser($username, $password);
    if (is_array($checkuser)) {
        
        $_SESSION['username'] = $checkuser;
        header('location:../index.php');
        echo '<script>alert("Đăng nhập thành công")</script>';
    } else {
        echo '<script>alert("Tên đăng nhập hoặc mật khẩu không phải tài khoản admin")</script>';
        header('location:login.php');
        
    }
}
?>

<body>

    <div class="login-box">
        <h2>Login</h2>
        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="user-box">
                <input type="text" name="username" required="">
                <label>Username</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" required="">
                <label>Password</label>
            </div>
            <a href="#">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <input type="submit" name="login" value="Đăng nhập">
            </a>
        </form>
    </div>
</body>

</html>