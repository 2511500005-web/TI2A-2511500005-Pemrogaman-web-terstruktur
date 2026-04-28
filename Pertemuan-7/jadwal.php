<?php
include "config.php";

$file = "data.json";
$json = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

if(!isset($json['jadwal'])) $json['jadwal'] = [];

if(isset($_POST['tambah'])){
    $namaFile = "";
    if($_FILES['materi']['name']!=""){
        $namaFile = time()."_".$_FILES['materi']['name'];
        move_uploaded_file($_FILES['materi']['tmp_name'],"uploads/".$namaFile);
    }

    $json['jadwal'][] = [
        "kode"=>$_POST['kode'],
        "matkul"=>$_POST['matkul'],
        "sks"=>$_POST['sks'],
        "kelas"=>$_POST['kelas'],
        "jam"=>$_POST['jam'],
        "ruang"=>$_POST['ruang'],
        "pengajar"=>$_POST['pengajar'],
        "materi"=>$namaFile
    ];

    file_put_contents($file, json_encode($json, JSON_PRETTY_PRINT));
    header("Location: jadwal.php");
}

if(isset($_GET['hapus'])){
    if(isset($json['jadwal'][$_GET['hapus']])){
        unset($json['jadwal'][$_GET['hapus']]);
        $json['jadwal'] = array_values($json['jadwal']);
        file_put_contents($file, json_encode($json, JSON_PRETTY_PRINT));
    }
    header("Location: jadwal.php");
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
<h2>Jadwal Kuliah</h2>

<form method="POST" enctype="multipart/form-data">
<input name="kode" placeholder="Kode">
<input name="matkul" placeholder="Mata Kuliah">
<input name="sks" placeholder="SKS">
<input name="kelas" placeholder="Kelas">
<input name="jam" placeholder="Hari/Jam">
<input name="ruang" placeholder="Ruang">
<input name="pengajar" placeholder="Pengajar">
<input type="file" name="materi">
<button name="tambah">Tambah</button>
</form>

<table>
<tr>
<th>No</th>
<th>Kode</th>
<th>Mata Kuliah</th>
<th>SKS</th>
<th>Kelas</th>
<th>Hari/Jam</th>
<th>Ruang</th>
<th>Pengajar</th>
<th>File</th>
<th>Aksi</th>
</tr>

<?php foreach($json['jadwal'] as $i=>$j): ?>
<tr>
<td><?= $i+1 ?></td>
<td><?= $j['kode'] ?></td>
<td><?= $j['matkul'] ?></td>
<td><?= $j['sks'] ?></td>
<td><?= $j['kelas'] ?></td>
<td><?= $j['jam'] ?></td>
<td><?= $j['ruang'] ?></td>
<td><?= $j['pengajar'] ?></td>
<td>
<?php if($j['materi']!=""): ?>
<a href="uploads/<?= $j['materi'] ?>">File</a>
<?php endif; ?>
</td>
<td><a href="?hapus=<?= $i ?>">Hapus</a></td>
</tr>
<?php endforeach; ?>
</table>
</div>

<?php include "partials/footer.php"; ?>
</body>
</html>