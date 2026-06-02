<?php
include "config.php";

if(!isset($_SESSION['login'])){
    header("Location:index.php");
    exit;
}

$file = "data.json";

$json = file_exists($file)
    ? json_decode(file_get_contents($file), true)
    : [];

if(!isset($json['jadwal'])){
    $json['jadwal'] = [];
}

foreach($json['jadwal'] as $i => $j){

    if(!isset($json['jadwal'][$i]['detail_jadwal'])){

        $json['jadwal'][$i]['detail_jadwal'] = [];

    }

}
?>

<html>

<head>

<title>Detail Jadwal</title>

<link rel="stylesheet" href="assets/style.css">

<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
rel="stylesheet">

</head>

<body>

<?php include "partials/header.php"; ?>

<?php include "partials/sidebar.php"; ?>

<div class="content">

<h2>Detail Jadwal</h2>

<div class="card p-3">

<table class="table table-bordered table-striped">

<tr class="table-primary">

<th>No</th>
<th>Kode</th>
<th>Mata Kuliah</th>
<th>Kelas</th>
<th>Hari / Jam</th>
<th>Ruang</th>
<th>Dosen</th>
<th>Materi</th>
<th>Detail Tambahan</th>

</tr>

<?php if(count($json['jadwal']) > 0): ?>

<?php foreach($json['jadwal'] as $i => $j): ?>

<tr>

<td><?= $i+1 ?></td>

<td><?= $j['kode'] ?></td>

<td><?= $j['matkul'] ?></td>

<td><?= $j['kelas'] ?></td>

<td><?= $j['jam'] ?></td>

<td><?= $j['ruang'] ?></td>

<td><?= $j['pengajar'] ?></td>

<td>

<?php if($j['materi'] != ""): ?>

<a
href="uploads/<?= $j['materi'] ?>"
class="btn btn-success btn-sm">
Download
</a>

<?php else: ?>

<span class="text-danger">
Belum Ada
</span>

<?php endif; ?>

</td>

<td>

<?php if(count($j['detail_jadwal']) > 0): ?>

<table class="table table-bordered table-sm">

<tr class="table-dark">

<th>Mapel</th>
<th>Hari</th>
<th>Jam</th>
<th>Kelas</th>

</tr>

<?php foreach($j['detail_jadwal'] as $d): ?>

<tr>

<td><?= $d['mapel'] ?></td>

<td><?= $d['hari'] ?></td>

<td><?= $d['jam'] ?></td>

<td><?= $d['kelas'] ?></td>

</tr>

<?php endforeach; ?>

</table>

<?php else: ?>

<span class="text-danger">
Belum ada detail
</span>

<?php endif; ?>

</td>

</tr>

<?php endforeach; ?>

<?php else: ?>

<tr>

<td colspan="9" class="text-center">
Data jadwal kosong
</td>

</tr>

<?php endif; ?>

</table>

</div>

</div>

<?php include "partials/footer.php"; ?>

</body>

</html>