<?php
include "config.php";
if(isset($_SESSION['login'])) header("Location: dashboard.php");

if(isset($_POST['login'])){
    if($_POST['username']=="guru" && $_POST['password']=="123"){
        $_SESSION['login']=true; $_SESSION['role']="guru";
        header("Location: dashboard.php");
    } elseif($_POST['username']=="siswa" && $_POST['password']=="123"){
        $_SESSION['login']=true; $_SESSION['role']="siswa";
        header("Location: dashboard.php");
    } else $error="Login gagal";
}
?>
<html><head><link rel="stylesheet" href="assets/style.css"></head>
<body class="login-body">
<div class="login-box">
<h2>Login</h2>
<?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>
<form method="POST">
<input name="username" placeholder="Username"><br>
<input type="password" name="password" placeholder="Password"><br>
<button name="login">Login</button>
</form>
</div></body></html>