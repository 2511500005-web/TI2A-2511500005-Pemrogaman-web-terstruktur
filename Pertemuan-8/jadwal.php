   - <?php
include "config.php";

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


if(count($json['jadwal']) == 0){

    $json['jadwal'] = [

        [
            "kode"=>"IT202",
            "matkul"=>"Kalkulus 2",
            "kelas"=>"TI2A",
            "jam"=>"Senin 08:00-10:30",
            "ruang"=>"2.2.4",
            "pengajar"=>"R Burham I. F.",
            "materi"=>"",

            "detail_jadwal"=>[
                [
                    "mapel"=>"Kalkulus 2",
                    "hari"=>"Senin",
                    "jam"=>"08:00-10:30",
                    "kelas"=>"TI2A"
                ]
            ]
        ]

    ];

    file_put_contents($file, json_encode($json, JSON_PRETTY_PRINT));
}

$edit = "";

$dataEdit = [
    "kode"=>"",
    "matkul"=>"",
    "kelas"=>"",
    "jam"=>"",
    "ruang"=>"",
    "pengajar"=>"",
    "materi"=>"",
    "detail_jadwal"=>[]
];


if(isset($_GET['edit'])){

    $edit = $_GET['edit'];

    if(isset($json['jadwal'][$edit])){

        $dataEdit = $json['jadwal'][$edit];

    }
}


if(isset($_POST['simpan'])){

    $fileMateri = $_POST['old'];

    if($_FILES['materi']['name'] != ""){

        $fileMateri = time()."_".$_FILES['materi']['name'];

        move_uploaded_file(
            $_FILES['materi']['tmp_name'],
            "uploads/".$fileMateri
        );
    }

    $detail = [];

    if(isset($_POST['detail_mapel'])){

        for($i=0; $i<count($_POST['detail_mapel']); $i++){

            if($_POST['detail_mapel'][$i] != ""){

                $detail[] = [

                    "mapel" => $_POST['detail_mapel'][$i],
                    "hari"  => $_POST['detail_hari'][$i],
                    "jam"   => $_POST['detail_jam'][$i],
                    "kelas" => $_POST['detail_kelas'][$i]

                ];

            }

        }

    }

    $data = [

        "kode"     => $_POST['kode'],
        "matkul"   => $_POST['matkul'],
        "kelas"    => $_POST['kelas'],
        "jam"      => $_POST['jam'],
        "ruang"    => $_POST['ruang'],
        "pengajar" => $_POST['pengajar'],
        "materi"   => $fileMateri,
        "detail_jadwal" => $detail

    ];

    if($_POST['index'] == ""){

        $json['jadwal'][] = $data;

    } else {

        $json['jadwal'][$_POST['index']] = $data;

    }

    file_put_contents($file, json_encode($json, JSON_PRETTY_PRINT));

    header("Location: jadwal.php");
}

/* HAPUS */
if(isset($_GET['hapus'])){

    unset($json['jadwal'][$_GET['hapus']]);

    $json['jadwal'] = array_values($json['jadwal']);

    file_put_contents($file, json_encode($json, JSON_PRETTY_PRINT));

    header("Location: jadwal.php");
}
?>

<html>

<head>

<title>Jadwal Kuliah</title>

<link rel="stylesheet" href="assets/style.css">

<style>

.detail-row{
    display:grid;
    grid-template-columns:1fr 1fr 1fr 1fr;
    gap:10px;
    margin-bottom:10px;
}

.detail-row select,
.detail-row input{
    padding:10px;
    border:1px solid #ccc;
    border-radius:8px;
}

.btn-detail{
    background:#17a2b8;
    color:white;
    border:none;
    padding:10px 15px;
    border-radius:8px;
    cursor:pointer;
    margin-top:10px;
}

</style>

</head>

<body>

<?php include "partials/header.php"; ?>
<?php include "partials/sidebar.php"; ?>

<div class="content">

<h2>Data Jadwal</h2>

<div class="form-jadwal">

<h3>
<?= $edit=="" ? "Tambah Jadwal" : "Edit Jadwal" ?>
</h3>

<form method="POST" enctype="multipart/form-data">

<input type="hidden" name="index" value="<?= $edit ?>">
<input type="hidden" name="old" value="<?= $dataEdit['materi'] ?>">

<div class="form-grid">

<div class="form-group">

<label>Kode Jadwal</label>

<input
type="text"
name="kode"
value="<?= $dataEdit['kode'] ?>"
placeholder="Kode Jadwal">

</div>

<div class="form-group">

<label>Guru / Dosen</label>

<input
type="text"
name="pengajar"
value="<?= $dataEdit['pengajar'] ?>"
placeholder="Nama Pengajar">

</div>

<div class="form-group">

<label>Mata Kuliah</label>

<input
type="text"
name="matkul"
value="<?= $dataEdit['matkul'] ?>"
placeholder="Mata Kuliah">

</div>

<div class="form-group">

<label>Kelas</label>

<input
type="text"
name="kelas"
value="<?= $dataEdit['kelas'] ?>"
placeholder="Kelas">

</div>

<div class="form-group">

<label>Hari / Jam</label>

<input
type="text"
name="jam"
value="<?= $dataEdit['jam'] ?>"
placeholder="Senin 08:00-10:30">

</div>

<div class="form-group">

<label>Ruang</label>

<input
type="text"
name="ruang"
value="<?= $dataEdit['ruang'] ?>"
placeholder="Ruang">

</div>

<div class="form-group" style="grid-column:1/3;">

<label>Upload Materi</label>

<input type="file" name="materi">

</div>

</div>

<hr>

<h3>Tambah Detail Jadwal</h3>

<div id="detail-container">

<?php

if(count($dataEdit['detail_jadwal']) > 0):

foreach($dataEdit['detail_jadwal'] as $d):

?>

<div class="detail-row">

<select name="detail_mapel[]">

<option value="">--Pilih Mapel--</option>

<option
value="<?= $d['mapel'] ?>"
selected
> 
<?=$d['mapel'] ?>
</option>

</select>

<select name="detail_hari[]">

<option value="">--Pilih Hari--</option>

<?php

$hari = [
    "Senin",
    "Selasa",
    "Rabu",
    "Kamis",
    "Jumat"
];

foreach($hari as $h):

?>

<option
value="<?= $h ?>"
<?= $d['hari']==$h ? 'selected' : '' ?>
> 
<?=$h ?>
</option>

<?php endforeach; ?>

</select>

<select name="detail_jam[]">

<option value="">--Pilih Jam--</option>

<?php

$jamList = [
    "08:00-10:30",
    "10:30-13:00",
    "13:00-16:20"
];

foreach($jamList as $j):

?>

<option
value="<?= $j ?>"
<?= $d['jam']==$j ? 'selected' : '' ?>
> 
<?=$j ?>
</option>

<?php endforeach; ?>

</select>

<input
type="text"
name="detail_kelas[]"
placeholder="Kelas"
value="<?= $d['kelas'] ?>"
>

</div>

<?php
endforeach;
else:
?>

<div class="detail-row">

<select name="detail_mapel[]">

<option value="">--Pilih Mapel--</option>

<option value="Kalkulus 2">Kalkulus 2</option>
<option value="Basis Data">Basis Data</option>
<option value="Pemrograman Web">Pemrograman Web</option>
<option value="Algoritma">Algoritma</option>

</select>

<select name="detail_hari[]">

<option value="">--Pilih Hari--</option>

<option value="Senin">Senin</option>
<option value="Selasa">Selasa</option>
<option value="Rabu">Rabu</option>
<option value="Kamis">Kamis</option>
<option value="Jumat">Jumat</option>

</select>

<select name="detail_jam[]">

<option value="">--Pilih Jam--</option>

<option value="08:00-10:30">08:00-10:30</option>
<option value="10:30-13:00">10:30-13:00</option>
<option value="13:00-16:20">13:00-16:20</option>

</select>

<input
type="text"
name="detail_kelas[]"
placeholder="Kelas"
>

</div>

<?php endif; ?>

</div>

<button
type="button"
class="btn-detail"
onclick="tambahDetail()"
> 
+Tambah Mapel
</button>

<br><br>

<button class="btn-simpan" name="simpan">

<?= $edit=="" ? "Simpan" : "Update" ?>

</button>

</form>

</div>

<hr>

<table border="1" cellpadding="10" cellspacing="0">

<tr>

<th>No</th>
<th>Kode</th>
<th>Mata Kuliah</th>
<th>Kelas</th>
<th>Hari/Jam</th>
<th>Ruang</th>
<th>Dosen</th>
<th>Aksi</th>

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

<td>

<a href="?edit=<?= $i ?>">Edit</a>

|

<a href="?hapus=<?= $i ?>">Hapus</a>

</td>

</tr>

<?php endforeach; ?>

</table>

</div>

<script>

function tambahDetail(){

    let html = `

    <div class="detail-row">

        <select name="detail_mapel[]">

            <option value="">--Pilih Mapel--</option>

            <option value="Kalkulus 2">Kalkulus 2</option>
            <option value="Basis Data">Basis Data</option>
            <option value="Pemrograman Web">Pemrograman Web</option>
            <option value="Algoritma">Algoritma</option>

        </select>

        <select name="detail_hari[]">

            <option value="">--Pilih Hari--</option>

            <option value="Senin">Senin</option>
            <option value="Selasa">Selasa</option>
            <option value="Rabu">Rabu</option>
            <option value="Kamis">Kamis</option>
            <option value="Jumat">Jumat</option>

        </select>

        <select name="detail_jam[]">

            <option value="">--Pilih Jam--</option>

            <option value="08:00-10:30">08:00-10:30</option>
            <option value="10:30-13:00">10:30-13:00</option>
            <option value="13:00-16:20">13:00-16:20</option>

        </select>

        <input
        type="text"
        name="detail_kelas[]"
        placeholder="Kelas">

    </div>

    `;

    document
    .getElementById("detail-container")
    .insertAdjacentHTML("beforeend", html);

}

</script>

<?php include "partials/footer.php"; ?>

</body>

</html>