<?php
include "config.php";

if(isset($_SESSION['login'])){
    header("Location: dashboard.php");
    exit;
}

if(isset($_POST['login'])){
    $_SESSION['login']=true;

    if(strtolower($_POST['username'])=="guru"){
        $_SESSION['role']="guru";
    } else {
        $_SESSION['role']="siswa";
    }

    header("Location: dashboard.php");
    exit;
}
?>
<html>
<head><link rel="stylesheet" href="assets/style.css"></head>
<body class="login-body">
<div class="login-box">
<h2>Login (Bebas)</h2>
<form method="POST">
<input name="username" placeholder="Username"><br>
<input type="password" name="password" placeholder="Password"><br>
<button name="login">Login</button>
</form>
<p>Ketik "guru" untuk akses guru, selain itu siswa</p>
</div>
</body>
</html>