<<<<<<< HEAD
- <?php
include "config.php";

if(!isset($_SESSION['login'])){
    header("Location:index.php");
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

$username = $_SESSION['username'];
$role = $_SESSION['role'];

?>

<!DOCTYPE html>

<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Lihat Jadwal</title>

<link rel="stylesheet"
href="assets/style.css">

</head>

<body>

<?php include "partials/header.php"; ?>

<?php include "partials/sidebar.php"; ?>

<div class="content">

<div class="card">

<h2>Jadwal</h2>

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

<?php

$no = 1;

foreach($json['jadwal'] as $j):

    /* FILTER GURU */

    if($role == "guru"){

        if(
            strtolower($j['pengajar'])
            != strtolower($username)
        ){
            continue;
        }

    }

    /* FILTER SISWA */

    if($role == "siswa"){

        if(
            strtolower($j['kelas'])
            != strtolower($_SESSION['kelas'])
        ){
            continue;
        }

    }

?>

<tr>

<td><?= $no++ ?></td>

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
=======
- <?php
include "config.php";

if(!isset($_SESSION['login'])){
    header("Location:index.php");
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

$username = $_SESSION['username'];
$role = $_SESSION['role'];

?>

<!DOCTYPE html>

<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Lihat Jadwal</title>

<link rel="stylesheet"
href="assets/style.css">

</head>

<body>

<?php include "partials/header.php"; ?>

<?php include "partials/sidebar.php"; ?>

<div class="content">

<div class="card">

<h2>Jadwal</h2>

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

<?php

$no = 1;

foreach($json['jadwal'] as $j):

    /* FILTER GURU */

    if($role == "guru"){

        if(
            strtolower($j['pengajar'])
            != strtolower($username)
        ){
            continue;
        }

    }

    /* FILTER SISWA */

    if($role == "siswa"){

        if(
            strtolower($j['kelas'])
            != strtolower($_SESSION['kelas'])
        ){
            continue;
        }

    }

?>

<tr>

<td><?= $no++ ?></td>

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
>>>>>>> 927050f957227fb1c96bfdf6e8ba7fc8aa977e5e
</html>