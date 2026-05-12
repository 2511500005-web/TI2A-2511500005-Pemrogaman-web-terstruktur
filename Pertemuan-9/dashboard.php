<?php
include "config.php";
if(!isset($_SESSION['login'])) header("Location:index.php");

$file = "data.json";
$json = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

if(!isset($json['biodata'])) $json['biodata'] = [];
if(!isset($json['master'])) $json['master'] = [];

if(isset($_POST['simpan_biodata'])){
    $json['biodata'] = [
        "nim"=>$_POST['nim'],
        "nama"=>$_POST['nama'],
        "ipk"=>$_POST['ipk'],
        "judul"=>$_POST['judul'],
        "grade"=>$_POST['grade'],
        "nisn"=>$_POST['nisn'],
        "ibu"=>$_POST['ibu'],
        "ayah"=>$_POST['ayah'],
        "tempat"=>$_POST['tempat'],
        "tanggal"=>$_POST['tanggal'],
        "jk"=>$_POST['jk'],
        "agama"=>$_POST['agama'],
        "hp"=>$_POST['hp'],
        "nik"=>$_POST['nik'],
        "alamat"=>$_POST['alamat']
    ];
    file_put_contents($file, json_encode($json, JSON_PRETTY_PRINT));
    header("Location: dashboard.php");
}

if(isset($_POST['tambah_master'])){
    $json['master'][] = [
        "kode"=>$_POST['kode'],
        "nama"=>$_POST['nama_master']
    ];
    file_put_contents($file, json_encode($json, JSON_PRETTY_PRINT));
    header("Location: dashboard.php");
}

if(isset($_GET['hapus_master'])){
    unset($json['master'][$_GET['hapus_master']]);
    $json['master'] = array_values($json['master']);
    file_put_contents($file, json_encode($json, JSON_PRETTY_PRINT));
    header("Location: dashboard.php");
}

$data = $json['biodata'];
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

<h4>Biodata Mahasiswa / Guru</h4>
<form method="POST">
<table class="table table-bordered table-striped">
<tr><th>NIM</th><td><input name="nim" class="form-control" value="<?= $data['nim'] ?? '' ?>"></td></tr>
<tr><th>Nama</th><td><input name="nama" class="form-control" value="<?= $data['nama'] ?? '' ?>"></td></tr>
<tr><th>IPK</th><td><input name="ipk" class="form-control" value="<?= $data['ipk'] ?? '' ?>"></td></tr>
<tr><th>Judul TA/Skripsi</th><td><input name="judul" class="form-control" value="<?= $data['judul'] ?? '' ?>"></td></tr>
<tr><th>Grade</th><td><input name="grade" class="form-control" value="<?= $data['grade'] ?? '' ?>"></td></tr>
<tr><th>NISN</th><td><input name="nisn" class="form-control" value="<?= $data['nisn'] ?? '' ?>"></td></tr>
<tr><th>Nama Ibu</th><td><input name="ibu" class="form-control" value="<?= $data['ibu'] ?? '' ?>"></td></tr>
<tr><th>Nama Ayah</th><td><input name="ayah" class="form-control" value="<?= $data['ayah'] ?? '' ?>"></td></tr>
<tr><th>Tempat Lahir</th><td><input name="tempat" class="form-control" value="<?= $data['tempat'] ?? '' ?>"></td></tr>
<tr><th>Tanggal Lahir</th><td><input type="date" name="tanggal" class="form-control" value="<?= $data['tanggal'] ?? '' ?>"></td></tr>
<tr><th>Jenis Kelamin</th><td><input name="jk" class="form-control" value="<?= $data['jk'] ?? '' ?>"></td></tr>
<tr><th>Agama</th><td><input name="agama" class="form-control" value="<?= $data['agama'] ?? '' ?>"></td></tr>
<tr><th>No HP</th><td><input name="hp" class="form-control" value="<?= $data['hp'] ?? '' ?>"></td></tr>
<tr><th>NIK</th><td><input name="nik" class="form-control" value="<?= $data['nik'] ?? '' ?>"></td></tr>
<tr><th>Alamat</th><td><textarea name="alamat" class="form-control"><?= $data['alamat'] ?? '' ?></textarea></td></tr>
</table>
<button name="simpan_biodata" class="btn btn-primary">Simpan</button>
</form>

<hr>

<h4>Master Data Mata Kuliah</h4>
<form method="POST" class="row">
<div class="col"><input name="kode" class="form-control" placeholder="Kode"></div>
<div class="col"><input name="nama_master" class="form-control" placeholder="Nama Mata Kuliah"></div>
<div class="col"><button name="tambah_master" class="btn btn-success">Tambah</button></div>
</form>

<table class="table table-bordered mt-3">
<tr><th>No</th><th>Kode</th><th>Nama</th><th>Aksi</th></tr>
<?php foreach($json['master'] as $i=>$m): ?>
<tr>
<td><?= $i+1 ?></td>
<td><?= $m['kode'] ?></td>
<td><?= $m['nama'] ?></td>
<td><a href="?hapus_master=<?= $i ?>" class="btn btn-danger btn-sm">Hapus</a></td>
</tr>
<?php endforeach; ?>
</table>
</div>

<?php include "partials/footer.php"; ?>
</body>
</html>