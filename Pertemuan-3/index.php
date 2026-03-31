<?php
session_start();
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_destroy();
    header('Location: index.php');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $_SESSION['username'] = $_POST['username'] ?: 'Guest';
    header('Location: index.php');
    exit;
}
$logged_in = isset($_SESSION['username']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Dashboard Kampus</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {margin:0;font-family:Arial, sans-serif;}
    .navbar {background:#fff;padding:10px;border-bottom:1px solid #ccc;}
    .navbar a {margin-right:15px;text-decoration:none;color:#333;}
    .sidebar {position:fixed;top:0;left:0;width:220px;height:100%;background:#222;color:#fff;padding-top:60px;}
    .sidebar a {display:block;padding:10px 20px;color:#ccc;text-decoration:none;}
    .sidebar a:hover {background:#444;color:#fff;}
    .content {margin-left:220px;padding:20px;}
    .card {background:#fff;border:1px solid #ddd;border-radius:4px;padding:20px;margin-bottom:20px;}
    footer {background:#f4f4f4;text-align:center;padding:10px;position:fixed;bottom:0;left:220px;right:0;}
    h1,h4 {margin-top:0;}
    table {width:100%;border-collapse:collapse;}
    th,td {border:1px solid #ccc;padding:8px;text-align:left;}
    th {background:#eee;}
    select {width:100%;}
  </style>
</head>
<body>

<?php if (!$logged_in): ?>
<div class="content" style="margin-left:0;">
  <div class="card" style="max-width:400px;margin:50px auto;">
    <h2>Login Sistem Kampus</h2>
    <form method="post" action="index.php">
      <div><input type="text" name="username" placeholder="Username" style="width:100%;padding:8px;margin-bottom:10px;"></div>
      <div><input type="password" name="password" placeholder="Password" style="width:100%;padding:8px;margin-bottom:10px;"></div>
      <div><button type="submit" name="login" style="padding:10px 20px;">Login</button></div>
    </form>
  </div>
</div>

<?php else: ?>
<div class="navbar">
  <a href="index.php">Home</a>
  <a href="#">Contact</a>
  <span style="float:right;"><?= $_SESSION['username'] ?> | <a href="index.php?action=logout">Logout</a></span>
</div>

<div class="sidebar">
  <a href="index.php?page=mapel">Master - Mata Kuliah</a>
  <a href="index.php?page=guru">Master - Dosen</a>
  <a href="index.php?page=mahasiswa">Master - Mahasiswa</a>
  <a href="index.php?page=kelas">Master - Kelas</a>
  <a href="index.php?page=jadwal">Transaksi - Jadwal Kuliah</a>
  <a href="index.php?page=akses_guru">Akses Dosen</a>
  <a href="index.php?page=akses_siswa">Akses Mahasiswa</a>
  <a href="http://localhost/phpmyadmin/index.php?route=/export" target="_blank">Database Export</a>
</div>

<div class="content">
  <div class="card">
    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : "";
    if ($page == "") {
        echo "<h1>Dashboard</h1><p>Selamat Datang di Sistem Informasi Kampus XYZ</p>";
    } elseif ($page == "mahasiswa") {
        echo "<h4>Daftar Kehadiran Mahasiswa</h4><table><tr><th>No</th><th>Nama</th><th>Status Kehadiran</th></tr>";
        for ($i=1; $i<=31; $i++) {
            $nama = "Mahasiswa ".str_pad($i,2,"0",STR_PAD_LEFT);
            echo "<tr><td>$i</td><td>$nama</td><td><select><option>Hadir</option><option>Izin</option><option>Sakit</option><option>Alpa</option></select></td></tr>";
        }
        echo "</table>";
    } elseif ($page == "jadwal") {
        echo "<h4>Jadwal Kuliah</h4><table><tr><th>No</th><th>Kode</th><th>Mata Kuliah</th><th>SKS</th><th>Kelas</th><th>Hari, Jam</th><th>Ruang</th><th>Dosen</th></tr>
        <tr><td>1</td><td>IT202</td><td>Kalkulus 2</td><td>3</td><td>TI2A</td><td>Senin, 08:00–09:30</td><td>2.2.4</td><td>R. Burham I. F.</td></tr>
        <tr><td>2</td><td>IF901</td><td>Algoritma dan Struktur Data</td><td>4</td><td>TI2A</td><td>Senin, 13:00–16:30</td><td>LAB 3</td><td>Elza Budi Perkasa</td></tr>
        <tr><td>3</td><td>IT311</td><td>Pemrograman Web Terstruktur</td><td>3</td><td>TI2A</td><td>Selasa, 13:00–15:30</td><td>LAB 3</td><td>Delpiah W.</td></tr>
        <tr><td>4</td><td>IT305</td><td>Sistem Manajemen Basis Data</td><td>3</td><td>TI2A</td><td>Rabu, 08:00–09:30</td><td>2.2.4</td><td>Metde Suci M.</td></tr>
        <tr><td>5</td><td>IT306</td><td>Desain dan Pemrograman Mobile</td><td>3</td><td>TI2A</td><td>Kamis, 08:00–09:30</td><td>LAB 4</td><td>Rezky Yuanda</td></tr>
        <tr><td>6</td><td>UM301</td><td>English For Business</td><td>3</td><td>TI2A</td><td>Kamis, 13:00–15:30</td><td>2.1.6</td><td>Sintis B.</td></tr>
        <tr><td>7</td><td>MT102</td><td>Agama</td><td>2</td><td>KRT</td><td>Jumat, 13:00–15:30</td><td>1.3.9</td><td>Shio Mulyadanti</td></tr>
        </table><p><strong>Jumlah SKS: 20</strong></p>";
    } elseif ($page == "mapel") {
        echo "<h4>Data Mata Kuliah</h4><p>(CRUD bisa ditambahkan di sini)</p>";
    } else {
        echo "<p>Halaman tidak ditemukan.</p>";
    }
    ?>
  </div>
</div>

<footer>&copy; 2026 Dashboard Kampus. All rights reserved.</footer>
<?php endif; ?>
</body>
</html>