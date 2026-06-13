
<?php
include "config.php";

$file = "data.json";
$json = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

if(!isset($json['ekstra'])) $json['ekstra'] = [];

$id = isset($_GET['id']) ? $_GET['id'] : "";
if($id==="" || !isset($json['ekstra'][$id])){
    header("Location: ekstraNimAnda.php");
    exit;
}

$data = $json['ekstra'][$id];

if(isset($_POST['update'])){
    $json['ekstra'][$id] = [
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
<h2>Edit Ekstrakurikuler</h2>

<form method="POST">
<input name="id" value="<?= $data['id'] ?>"><br>
<input name="nama" value="<?= $data['nama'] ?>"><br>
<input name="ket" value="<?= $data['ket'] ?>"><br>

<select name="semester">
<option value="1" <?= $data['semester']=="1"?'selected':'' ?>>1</option>
<option value="2" <?= $data['semester']=="2"?'selected':'' ?>>2</option>
</select><br>

<select name="tahun">
<option value="2023" <?= $data['tahun']=="2023"?'selected':'' ?>>2023</option>
<option value="2024" <?= $data['tahun']=="2024"?'selected':'' ?>>2024</option>
<option value="2025" <?= $data['tahun']=="2025"?'selected':'' ?>>2025</option>
<option value="2026" <?= $data['tahun']=="2026"?'selected':'' ?>>2026</option>
</select><br>

<button name="update">Update</button>
</form>
</div>

<?php include "partials/footer.php"; ?>
</body>
</html>