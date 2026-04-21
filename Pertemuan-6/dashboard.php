<?php 
include "config.php"; 
if(!isset($_SESSION['login'])) header("Location:index.php");

$file = "data.json";
$data = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

if(isset($_POST['simpan'])){
  file_put_contents($file, json_encode($_POST, JSON_PRETTY_PRINT));
  echo "<script>alert('Data berhasil disimpan!'); location='';</script>";
}
?>

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

  <h4 class="mt-4">Biodata Mahasiswa/Guru</h4>

  <form method="POST">
    <table class="table table-bordered table-striped">
      <tbody>
        <tr><th>NIM</th><td><input name="nim" class="form-control" value="<?= $data['nim'] ?? '' ?>"></td></tr>
        <tr><th>Nama</th><td><input name="nama" class="form-control" value="<?= $data['nama'] ?? '' ?>"></td></tr>
        <tr><th>IPK</th><td><input name="ipk" class="form-control" value="<?= $data['ipk'] ?? '' ?>"></td></tr>
        <tr><th>Judul TA/Skripsi</th><td><input name="judul" class="form-control" value="<?= $data['judul'] ?? '' ?>"></td></tr>
        <tr><th>Grade TA/Skripsi</th><td><input name="grade" class="form-control" value="<?= $data['grade'] ?? '' ?>"></td></tr>
        <tr><th>NISN</th><td><input name="nisn" class="form-control" value="<?= $data['nisn'] ?? '' ?>"></td></tr>
        <tr><th>Nama Ibu Kandung</th><td><input name="ibu" class="form-control" value="<?= $data['ibu'] ?? '' ?>"></td></tr>
        <tr><th>Nama Ayah Kandung</th><td><input name="ayah" class="form-control" value="<?= $data['ayah'] ?? '' ?>"></td></tr>
        <tr><th>Tempat Lahir</th><td><input name="tempat" class="form-control" value="<?= $data['tempat'] ?? '' ?>"></td></tr>
        <tr><th>Tanggal Lahir</th><td><input name="tanggal" class="form-control" value="<?= $data['tanggal'] ?? '' ?>"></td></tr>
        <tr><th>Jenis Kelamin</th><td><input name="jk" class="form-control" value="<?= $data['jk'] ?? '' ?>"></td></tr>
        <tr><th>Agama</th><td><input name="agama" class="form-control" value="<?= $data['agama'] ?? '' ?>"></td></tr>
        <tr><th>No WA/HP</th><td><input name="hp" class="form-control" value="<?= $data['hp'] ?? '' ?>"></td></tr>
        <tr><th>NIK/No KTP</th><td><input name="nik" class="form-control" value="<?= $data['nik'] ?? '' ?>"></td></tr>
        <tr><th>Alamat Tinggal</th><td><textarea name="alamat" class="form-control"><?= $data['alamat'] ?? '' ?></textarea></td></tr>
      </tbody>
    </table>

    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
  </form>
</div>

<?php include "partials/footer.php"; ?>
</body>
</html>