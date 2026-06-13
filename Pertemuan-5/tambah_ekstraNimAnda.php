<?php
include "config.php";

$file = "data.json";
$json = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

if(!isset($json['ekstra'])) $json['ekstra'] = [];

if(isset($_POST['simpan'])){
    $json['ekstra'][] = [
        "id"=>$_POST['id'],
        "nama"=>$_POST['nama'],
        "ket"=>$_POST['ket'],
        "semester"=>$_POST['semester'],
        "tahun"=>$_POST['tahun']
    ];

    file_put_contents($file, json_encode($json, JSON_PRETTY_PRINT));
    header("Location: ekstraNimAnda.php");
}
?>

<html>
<head>
<link rel="stylesheet" href="assets/style.css">
</head>
<body>

<?php include "partials/header.php"; ?>
<?php include "partials/sidebar.php"; ?>

<div class="content">
<h2>Tambah Ekstrakurikuler</h2>

<form method="POST">
<input name="id" placeholder="ID"><br>
<input name="nama" placeholder="Nama Ekstra"><br>
<input name="ket" placeholder="Keterangan"><br>

<select name="semester">
<option value="">Pilih Semester</option>
<option value="1">1</option>
<option value="2">2</option>
</select><br>

<select name="tahun">
<option value="">Pilih Tahun</option>
<option value="2023">2023</option>
<option value="2024">2024</option>
<option value="2025">2025</option>
<option value="2026">2026</option>
</select><br>

<button name="simpan">Simpan</button>
</form>
</div>

<?php include "partials/footer.php"; ?>
</body>
</html>