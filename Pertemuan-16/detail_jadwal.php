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

?>

<html>

<head>

<title>Detail Jadwal</title>

<link rel="stylesheet" href="assets/style.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

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
</tr>

<?php if(count($json['jadwal']) > 0): ?>

    <?php foreach($json['jadwal'] as $i => $j): ?>

    <tr>

        <td><?= $i+1 ?></td>

        <td><?= $j['kode'] ?></td>

        <td><?= $j['matkul'] ?></td>

        <td>

            <?php
            for($k=1; $k<=3; $k++):
            ?>

                <div>
                    <?= $j['kelas'] ?> - Kelompok <?= $k ?>
                </div>

            <?php endfor; ?>

        </td>

        <td><?= $j['jam'] ?></td>

        <td><?= $j['ruang'] ?></td>

        <td><?= $j['pengajar'] ?></td>

        <td>

            <?php if($j['materi'] != ""): ?>

                <a
                    href="uploads/<?= $j['materi'] ?>"
                    class="btn btn-success btn-sm"
                >
                    Download
                </a>

            <?php else: ?>

                <span class="text-danger">
                    Belum Ada
                </span>

            <?php endif; ?>

        </td>

    </tr>

    <?php endforeach; ?>

<?php else: ?>

<tr>
    <td colspan="8">
        Data jadwal kosong
    </td>
</tr>

<?php endif; ?>

</table>

</div>

<br>

<div class="card p-3">

<h4>2</h4>

<?php

$hariList = [
    "Senin",
    "Selasa",
    "Rabu",
    "Kamis",
    "Jumat"
];

foreach($hariList as $hari):

?>

<h5 class="mt-3">
    <?= $hari ?>
</h5>

<table class="table table-bordered">

<tr class="table-dark">
    <th>Kode</th>
    <th>Mata Kuliah</th>
    <th>Kelas</th>
    <th>Jam</th>
</tr>

<?php

foreach($json['jadwal'] as $j):

if(strpos($j['jam'], $hari) !== false):

?>

<tr>

    <td><?= $j['kode'] ?></td>

    <td><?= $j['matkul'] ?></td>

    <td><?= $j['kelas'] ?></td>

    <td><?= $j['jam'] ?></td>

</tr>

<?php
endif;
endforeach;
?>

</table>

<?php endforeach; ?>

</div>

</div>

<?php include "partials/footer.php"; ?>

</body>

</html>