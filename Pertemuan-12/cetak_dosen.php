<?php
include "config.php";

if(!isset($_SESSION['login'])){
    header("Location:index.php");
    exit;
}

if($_SESSION['role'] != "guru"){
    header("Location:dashboard.php");
    exit;
}

$file = "data.json";

$json = file_exists($file)
? json_decode(file_get_contents($file), true)
: [];

if(!isset($json['jadwal'])){
    $json['jadwal'] = [];
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Cetak Jadwal Guru</title>

<link rel="stylesheet" href="assets/style.css">

<style>

@media print{

    .btn-print,
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

<h2>Jadwal Mengajar Guru</h2>

<button
class="btn-simpan btn-print"
onclick="window.print()">
Cetak
</button>

<br><br>

<table border="1" cellpadding="10" cellspacing="0">

<tr>

<th>No</th>
<th>Kode</th>
<th>Mata Kuliah</th>
<th>Kelas</th>
<th>Hari/Jam</th>
<th>Ruang</th>

</tr>

<?php

$no = 1;

foreach($json['jadwal'] as $j):

if(
strtolower($j['pengajar']) !=
strtolower($_SESSION['username'])
){
continue;
}

?>

<tr>

<td><?= $no++ ?></td>
<td><?= $j['kode'] ?></td>
<td><?= $j['matkul'] ?></td>
<td><?= $j['kelas'] ?></td>
<td><?= $j['jam'] ?></td>
<td><?= $j['ruang'] ?></td>

</tr>

<?php endforeach; ?>

</table>

</div>

<?php include "partials/footer.php"; ?>

</body>
</html>