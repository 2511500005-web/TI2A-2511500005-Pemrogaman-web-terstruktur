<?php
include "config.php";

$file = "data.json";
$json = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

if(!isset($json['jadwal'])) $json['jadwal'] = [];

if(count($json['jadwal']) == 0){
    $json['jadwal'] = [
        ["kode"=>"IT202","matkul"=>"Kalkulus 2","kelas"=>"TI2A","jam"=>"Senin 08:00-10:30","ruang"=>"2.2.4","pengajar"=>"R Burham I. F.","materi"=>""],
        ["kode"=>"IF901","matkul"=>"Algoritma & Struktur Data","kelas"=>"TI2A","jam"=>"Senin 13:00-16:20","ruang"=>"LAB.3","pengajar"=>"Eza Budi Perkasa","materi"=>""],
        ["kode"=>"IT311","matkul"=>"Pemrograman Web","kelas"=>"TI2A","jam"=>"Selasa 10:30-13:00","ruang"=>"LAB.3","pengajar"=>"Delpiah W.","materi"=>""],
        ["kode"=>"IT305","matkul"=>"Basis Data","kelas"=>"TI2A","jam"=>"Rabu 10:30-13:00","ruang"=>"2.2.4","pengajar"=>"Melati Suci","materi"=>""],
        ["kode"=>"IT306","matkul"=>"Pemrograman Mobile","kelas"=>"TI2A","jam"=>"Kamis 08:00-10:30","ruang"=>"LAB.2","pengajar"=>"Rezky Yuranda","materi"=>""],
        ["kode"=>"UM301","matkul"=>"English Business","kelas"=>"TI2A","jam"=>"Jumat 08:00-09:40","ruang"=>"1.2.1","pengajar"=>"Sinta S.","materi"=>""],
        ["kode"=>"MT102","matkul"=>"Agama","kelas"=>"KRT","jam"=>"Jumat 13:50-15:30","ruang"=>"2.1.6","pengajar"=>"Shito M.","materi"=>""]
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
    "materi"=>""
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

    $data = [
        "kode"     => $_POST['kode'],
        "matkul"   => $_POST['matkul'],
        "kelas"    => $_POST['kelas'],
        "jam"      => $_POST['jam'],
        "ruang"    => $_POST['ruang'],
        "pengajar" => $_POST['pengajar'],
        "materi"   => $fileMateri
    ];

    if($_POST['index'] == ""){
        $json['jadwal'][] = $data;
    } else {
        $json['jadwal'][$_POST['index']] = $data;
    }

    file_put_contents($file, json_encode($json, JSON_PRETTY_PRINT));

    header("Location: jadwal.php");
}

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
</head>

<body>

<?php include "partials/header.php"; ?>
<?php include "partials/sidebar.php"; ?>

<div class="content">

    <h2>Jadwal Kuliah</h2>

    <div style="margin-bottom:15px;">
        <b>TAHUN AJARAN:</b> 2025/2026 <br>
        <b>SEMESTER:</b> GENAP <br>
        <b>KELAS:</b> TI2A
    </div>

    <h3>
        <?= $edit=="" ? "Tambah Data" : "Edit Data" ?>
    </h3>

    <form method="POST" enctype="multipart/form-data">

        <input type="hidden" name="index" value="<?= $edit ?>">

        <input type="hidden" name="old" value="<?= $dataEdit['materi'] ?>">

        <input
            name="kode"
            placeholder="Kode"
            value="<?= $dataEdit['kode'] ?>"
        ><br>

        <input
            name="matkul"
            placeholder="Mata Kuliah"
            value="<?= $dataEdit['matkul'] ?>"
        ><br>

        <input
            name="kelas"
            placeholder="Kelas"
            value="<?= $dataEdit['kelas'] ?>"
        ><br>

        <input
            name="jam"
            placeholder="Hari/Jam"
            value="<?= $dataEdit['jam'] ?>"
        ><br>

        <input
            name="ruang"
            placeholder="Ruang"
            value="<?= $dataEdit['ruang'] ?>"
        ><br>

        <input
            name="pengajar"
            placeholder="Dosen"
            value="<?= $dataEdit['pengajar'] ?>"
        ><br>

        <input type="file" name="materi"><br>

        <button name="simpan">
            <?= $edit=="" ? "Tambah" : "Update" ?>
        </button>

    </form>

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
            <th>File</th>
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
                <?php if($j['materi'] != ""): ?>

                    <a href="uploads/<?= $j['materi'] ?>">
                        File
                    </a>

                <?php endif; ?>
            </td>

            <td>

                <a href="?edit=<?= $i ?>">
                    Edit
                </a>

                |

                <a href="?hapus=<?= $i ?>">
                    Hapus
                </a>

            </td>

        </tr>

        <?php endforeach; ?>

    </table>

</div>

<?php include "partials/footer.php"; ?>

</body>
</html>