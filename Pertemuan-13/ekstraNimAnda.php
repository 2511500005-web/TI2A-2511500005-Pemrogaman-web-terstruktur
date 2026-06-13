<<<<<<< HEAD
<?php
include "config.php";

$file = "data.json";
$json = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

if(!isset($json['ekstra'])) $json['ekstra'] = [];

$editIndex = "";
$editData = [
    "id"=>"",
    "nama"=>"",
    "ket"=>"",
    "semester"=>"",
    "tahun"=>""
];

if(isset($_GET['edit'])){
    $editIndex = $_GET['edit'];
    if(isset($json['ekstra'][$editIndex])){
        $editData = $json['ekstra'][$editIndex];
    }
}

if(isset($_POST['simpan'])){
    if($_POST['index']==""){
        $json['ekstra'][] = [
            "id"=>$_POST['id'],
            "nama"=>$_POST['nama'],
            "ket"=>$_POST['ket'],
            "semester"=>$_POST['semester'],
            "tahun"=>$_POST['tahun']
        ];
    } else {
        $json['ekstra'][$_POST['index']] = [
            "id"=>$_POST['id'],
            "nama"=>$_POST['nama'],
            "ket"=>$_POST['ket'],
            "semester"=>$_POST['semester'],
            "tahun"=>$_POST['tahun']
        ];
    }

    file_put_contents($file, json_encode($json, JSON_PRETTY_PRINT));
    header("Location: ekstraNimAnda.php");
}

if(isset($_GET['hapus'])){
    if(isset($json['ekstra'][$_GET['hapus']])){
        unset($json['ekstra'][$_GET['hapus']]);
        $json['ekstra'] = array_values($json['ekstra']);
        file_put_contents($file, json_encode($json, JSON_PRETTY_PRINT));
    }
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
<h2>Data Ekstrakurikuler</h2>

<h3><?= $editIndex==="" ? "Tambah Data" : "Edit Data" ?></h3>

<form method="POST">
<input type="hidden" name="index" value="<?= $editIndex ?>">

<input name="id" placeholder="ID" value="<?= $editData['id'] ?>"><br>
<input name="nama" placeholder="Nama Ekstra" value="<?= $editData['nama'] ?>"><br>
<input name="ket" placeholder="Keterangan" value="<?= $editData['ket'] ?>"><br>

<select name="semester">
<option value="1" <?= $editData['semester']=="1"?'selected':'' ?>>1</option>
<option value="2" <?= $editData['semester']=="2"?'selected':'' ?>>2</option>
</select><br>

<select name="tahun">
<option value="2023" <?= $editData['tahun']=="2023"?'selected':'' ?>>2023</option>
<option value="2024" <?= $editData['tahun']=="2024"?'selected':'' ?>>2024</option>
<option value="2025" <?= $editData['tahun']=="2025"?'selected':'' ?>>2025</option>
<option value="2026" <?= $editData['tahun']=="2026"?'selected':'' ?>>2026</option>
</select><br>

<button name="simpan"><?= $editIndex==="" ? "Tambah" : "Update" ?></button>
</form>

<hr>

<table>
<tr>
<th>No</th>
<th>ID</th>
<th>Nama</th>
<th>Keterangan</th>
<th>Semester</th>
<th>Tahun</th>
<th>Aksi</th>
</tr>

<?php foreach($json['ekstra'] as $i=>$e): ?>
<tr>
<td><?= $i+1 ?></td>
<td><?= $e['id'] ?></td>
<td><?= $e['nama'] ?></td>
<td><?= $e['ket'] ?></td>
<td><?= $e['semester'] ?></td>
<td><?= $e['tahun'] ?></td>
<td>
<a href="?edit=<?= $i ?>">Edit</a>
<a href="?hapus=<?= $i ?>">Hapus</a>
</td>
</tr>
<?php endforeach; ?>

</table>
</div>

<?php include "partials/footer.php"; ?>
</body>
=======
<?php
include "config.php";

$file = "data.json";
$json = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

if(!isset($json['ekstra'])) $json['ekstra'] = [];

$editIndex = "";
$editData = [
    "id"=>"",
    "nama"=>"",
    "ket"=>"",
    "semester"=>"",
    "tahun"=>""
];

if(isset($_GET['edit'])){
    $editIndex = $_GET['edit'];
    if(isset($json['ekstra'][$editIndex])){
        $editData = $json['ekstra'][$editIndex];
    }
}

if(isset($_POST['simpan'])){
    if($_POST['index']==""){
        $json['ekstra'][] = [
            "id"=>$_POST['id'],
            "nama"=>$_POST['nama'],
            "ket"=>$_POST['ket'],
            "semester"=>$_POST['semester'],
            "tahun"=>$_POST['tahun']
        ];
    } else {
        $json['ekstra'][$_POST['index']] = [
            "id"=>$_POST['id'],
            "nama"=>$_POST['nama'],
            "ket"=>$_POST['ket'],
            "semester"=>$_POST['semester'],
            "tahun"=>$_POST['tahun']
        ];
    }

    file_put_contents($file, json_encode($json, JSON_PRETTY_PRINT));
    header("Location: ekstraNimAnda.php");
}

if(isset($_GET['hapus'])){
    if(isset($json['ekstra'][$_GET['hapus']])){
        unset($json['ekstra'][$_GET['hapus']]);
        $json['ekstra'] = array_values($json['ekstra']);
        file_put_contents($file, json_encode($json, JSON_PRETTY_PRINT));
    }
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
<h2>Data Ekstrakurikuler</h2>

<h3><?= $editIndex==="" ? "Tambah Data" : "Edit Data" ?></h3>

<form method="POST">
<input type="hidden" name="index" value="<?= $editIndex ?>">

<input name="id" placeholder="ID" value="<?= $editData['id'] ?>"><br>
<input name="nama" placeholder="Nama Ekstra" value="<?= $editData['nama'] ?>"><br>
<input name="ket" placeholder="Keterangan" value="<?= $editData['ket'] ?>"><br>

<select name="semester">
<option value="1" <?= $editData['semester']=="1"?'selected':'' ?>>1</option>
<option value="2" <?= $editData['semester']=="2"?'selected':'' ?>>2</option>
</select><br>

<select name="tahun">
<option value="2023" <?= $editData['tahun']=="2023"?'selected':'' ?>>2023</option>
<option value="2024" <?= $editData['tahun']=="2024"?'selected':'' ?>>2024</option>
<option value="2025" <?= $editData['tahun']=="2025"?'selected':'' ?>>2025</option>
<option value="2026" <?= $editData['tahun']=="2026"?'selected':'' ?>>2026</option>
</select><br>

<button name="simpan"><?= $editIndex==="" ? "Tambah" : "Update" ?></button>
</form>

<hr>

<table>
<tr>
<th>No</th>
<th>ID</th>
<th>Nama</th>
<th>Keterangan</th>
<th>Semester</th>
<th>Tahun</th>
<th>Aksi</th>
</tr>

<?php foreach($json['ekstra'] as $i=>$e): ?>
<tr>
<td><?= $i+1 ?></td>
<td><?= $e['id'] ?></td>
<td><?= $e['nama'] ?></td>
<td><?= $e['ket'] ?></td>
<td><?= $e['semester'] ?></td>
<td><?= $e['tahun'] ?></td>
<td>
<a href="?edit=<?= $i ?>">Edit</a>
<a href="?hapus=<?= $i ?>">Hapus</a>
</td>
</tr>
<?php endforeach; ?>

</table>
</div>

<?php include "partials/footer.php"; ?>
</body>
>>>>>>> 927050f957227fb1c96bfdf6e8ba7fc8aa977e5e
</html>