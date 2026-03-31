<?php include "config.php";
if(!isset($_SESSION['login'])) header("Location:index.php"); ?>
<html><head><link rel="stylesheet" href="assets/style.css"></head>
<body>
<?php include "partials/header.php"; ?>
<?php include "partials/sidebar.php"; ?>
<div class="content"><h2>Dashboard</h2><p>Selamat datang!</p></div>
<?php include "partials/footer.php"; ?>
</body></html>