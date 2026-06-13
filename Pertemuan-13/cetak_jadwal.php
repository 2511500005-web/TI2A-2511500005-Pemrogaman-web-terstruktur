- <?php
include "config.php";

if(!isset($_SESSION['login'])){
    header("Location:index.php");
    exit;
}

/* KHUSUS ADMIN */

if($_SESSION['role'] != "admin"){

    header("Location:dashboard.php");

    exit;
}

$file = "data.json";

$json = file_exists($file)
    ? json_decode(
        file_get_contents($file),
        true
    )
    : [];

if(!isset($json['jadwal'])){
    $json['jadwal'] = [];
}

?>

<!DOCTYPE html>

<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Cetak Jadwal</title>

<link rel="stylesheet"
href="assets/style.css">

<style>

@media print{

    .btn-print{
        display:none;
    }

    .sidebar,
    .header,
    .footer{
        display:none;
    }

    .content{
        margin:0;
        padding:0;
    }

}

</style>

</head>

<body>

<?php include "partials/header.php"; ?>

<?php include "partials/sidebar.php"; ?>

<div class="content">

<div class="card">

<h2>Data Jadwal Kelas</h2>

<button
class="btn-simpan btn-print"
onclick="window.print()">

Cetak Jadwal

</button>

<br><br>

<table border="1"
cellpadding="10"
cellspacing="0">

<tr>

<th>No</th>
<th>Kode</th>
<th>Mata Kuliah</th>
<th>Kelas</th>
<th>Hari / Jam</th>
<th>Ruang</th>
<th>Dosen</th>

</tr>

<?php foreach($json['jadwal'] as $i => $j): ?>

<tr>

<td><?= $i+1 ?></td>

<td><?= $j['kode'] ?></td>

<td><?= $j['matkul'] ?></td>

<td><?= $j['kelas'] ?></td>

<td><?= $j['jam'] ?></td>

<td><?= $j['ruang'] ?></td>

<td><?= $j['pengajar'] ?></td>

</tr>

<?php endforeach; ?>

</table>

</div>

</div>

<?php include "partials/footer.php"; ?>

</body>
</html>