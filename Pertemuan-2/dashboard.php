<?php include "config.php";
if(!isset($_SESSION['login'])) header("Location:index.php"); ?>
<html>
<head>
  <link rel="stylesheet" href="assets/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include "partials/header.php"; ?>
<?php include "partials/sidebar.php"; ?>

<div class="content">
  <h2>Dashboard</h2>
  <p>Selamat datang!</p>

  <h4 class="mt-4">Biodata Mahasiswa</h4>
  <table class="table table-bordered table-striped">
    <tbody>
      <tr><th>NIM</th><td>2511500005</td></tr>
      <tr><th>Nama</th><td>MELVYN MAHINDA HADI</td></tr>
      <tr><th>IPK</th><td>3.16</td></tr>
      <tr><th>Judul TA/Skripsi</th><td>(Silahkan hubungi prodi jika tidak sesuai)</td></tr>
      <tr><th>Grade TA/Skripsi</th><td>(Silahkan hubungi prodi jika tidak sesuai)</td></tr>
      <tr><th>NISN</th><td>0062311143</td></tr>
      <tr><th>Nama Ibu Kandung</th><td>JAP ING ING</td></tr>
      <tr><th>Nama Ayah Kandung</th><td>HENDY HADI</td></tr>
      <tr><th>Tempat Lahir</th><td>PANGKALPINANG</td></tr>
      <tr><th>Tanggal Lahir</th><td>06/01/2006</td></tr>
      <tr><th>Jenis Kelamin</th><td>Laki-Laki</td></tr>
      <tr><th>Agama</th><td>Kristen Protestan</td></tr>
      <tr><th>No WA/HP</th><td>081369255717</td></tr>
      <tr><th>NIK/No KTP</th><td>1971040601060002</td></tr>
      <tr><th>Alamat Tinggal</th><td>JL MH MUHIDIN, Blok 038, RT 002, RW 001</td></tr>
      <tr><th>Dusun</th><td>MASJID JAMIK</td></tr>
      <tr><th>Desa/Kelurahan</th><td>MASJID JAMIK</td></tr>
      <tr><th>Kecamatan</th><td>KEC. RANGKUI, KOTA PANGKALPINANG</td></tr>
      <tr><th>Kode Pos</th><td>33132</td></tr>
    </tbody>
  </table>
</div>

<?php include "partials/footer.php"; ?>
</body>
</html>
