<?php
include "config.php";

if(isset($_SESSION['login'])){
    header("Location: dashboard.php");
}

if(isset($_POST['login'])){
    $user = $_POST['username'];
    $role = $_POST['role'];

    if(!empty($user)){
        $_SESSION['login']=true;
        $_SESSION['username']=$user;
        $_SESSION['role']=$role;
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Login gagal";
    }
}
?>

<html>
<head>
<link rel="stylesheet" href="assets/style.css">
</head>
<body class="login-body">

<div class="login-box">
<h2>Login Bebas</h2>

<form method="POST">
<input name="username" placeholder="Username"><br>
<input type="password" name="password" placeholder="Password"><br>

<select name="role">
  <option value="siswa">Mahasiswa</option>
  <option value="guru">Guru</option>
</select><br>

<button name="login">Login</button>
<button type="button" onclick="alert('Reset password berhasil')">Reset Password</button>
</form>

</div>

</body>
</html>