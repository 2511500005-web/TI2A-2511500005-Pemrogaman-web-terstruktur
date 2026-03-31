<?php
session_start();
$page = isset($_GET['page']) ? $_GET['page'] : "dashboard";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Dashboard Kampus</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="navbar">
  <a href="index.php">Home</a>
  <span style="float:right;">User: Admin | <a href="index.php?action=logout">Logout</a></span>
</div>

<div class="sidebar">
  <h2>Kampus XYZ</h2>
  <a href="index.php">Dashboard</a>
  <a href="index.php?page=mapel">Master - Mata Kuliah</a>
  <a href="index.php?page=guru">Master - Dosen</a>
  <a href="index.php?page=mahasiswa">Master - Mahasiswa</a>
  <a href="index.php?page=kelas">Master - Kelas</a>
  <a href="index.php?page=jadwal">Transaksi - Jadwal Kuliah</a>
  <a href="index.php?page=akses_guru">Akses Dosen</a>
  <a href="index.php?page=akses_siswa">Akses Mahasiswa</a>
  <a href="#">Database Export</a>
</div>

<div class="content">
  <div class="card">
    <?php
    if (file_exists("page/$page.php")) {
        include "page/$page.php";
    } else {
        echo "<p>Halaman tidak ditemukan.</p>";
    }
    ?>
  </div>
</div>

<footer>&copy; 2026 Dashboard Kampus. All rights reserved.</footer>
</body>
</html>