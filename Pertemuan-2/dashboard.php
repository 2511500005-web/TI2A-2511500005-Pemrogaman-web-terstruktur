<?php
include "config.php";

if(!isset($_SESSION['login'])){
    header("Location:index.php");
    exit;
}

$file = "data.json";
$json = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

if(!isset($json['biodata'])) $json['biodata'] = [];
if(!isset($json['master'])) $json['master'] = [];

/* SIMPAN BIODATA */
if(isset($_POST['simpan_biodata'])){
    $json['biodata'] = [
        "nim"      => $_POST['nim'],
        "nama"     => $_POST['nama'],
        "ipk"      => $_POST['ipk'],
        "judul"    => $_POST['judul'],
        "grade"    => $_POST['grade'],
        "nisn"     => $_POST['nisn'],
        "ibu"      => $_POST['ibu'],
        "ayah"     => $_POST['ayah'],
        "tempat"   => $_POST['tempat'],
        "tanggal"  => $_POST['tanggal'],
        "jk"       => $_POST['jk'],
        "agama"    => $_POST['agama'],
        "hp"       => $_POST['hp'],
        "nik"      => $_POST['nik'],
        "alamat"   => $_POST['alamat']
    ];

    file_put_contents($file, json_encode($json, JSON_PRETTY_PRINT));
    header("Location: dashboard.php");
    exit;
}

/* TAMBAH MASTER */
if(isset($_POST['tambah_master'])){
    $json['master'][] = [
        "kode" => $_POST['kode'],
        "nama" => $_POST['nama_master']
    ];

    file_put_contents($file, json_encode($json, JSON_PRETTY_PRINT));
    header("Location: dashboard.php");
    exit;
}

/* HAPUS MASTER */
if(isset($_GET['hapus_master'])){
    unset($json['master'][$_GET['hapus_master']]);
    $json['master'] = array_values($json['master']);

    file_put_contents($file, json_encode($json, JSON_PRETTY_PRINT));
    header("Location: dashboard.php");
    exit;
}

$data = $json['biodata'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard</title>

<link rel="stylesheet" href="assets/style.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<?php include "partials/header.php"; ?>
<?php include "partials/sidebar.php"; ?>

<div class="content">

    <div class="card p-4">

        <h2 class="mb-4 text-primary">
            Dashboard
        </h2>

        <!-- BIODATA -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    Biodata Mahasiswa / Guru
                </h5>
            </div>

            <div class="card-body">

                <form method="POST">

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label>NIM</label>
                            <input type="text" name="nim"
                            class="form-control"
                            value="<?= $data['nim'] ?? '' ?>">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Nama</label>
                            <input type="text" name="nama"
                            class="form-control"
                            value="<?= $data['nama'] ?? '' ?>">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>IPK</label>
                            <input type="text" name="ipk"
                            class="form-control"
                            value="<?= $data['ipk'] ?? '' ?>">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Grade</label>
                            <input type="text" name="grade"
                            class="form-control"
                            value="<?= $data['grade'] ?? '' ?>">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>NISN</label>
                            <input type="text" name="nisn"
                            class="form-control"
                            value="<?= $data['nisn'] ?? '' ?>">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Judul TA / Skripsi</label>
                            <input type="text" name="judul"
                            class="form-control"
                            value="<?= $data['judul'] ?? '' ?>">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Nama Ibu</label>
                            <input type="text" name="ibu"
                            class="form-control"
                            value="<?= $data['ibu'] ?? '' ?>">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Nama Ayah</label>
                            <input type="text" name="ayah"
                            class="form-control"
                            value="<?= $data['ayah'] ?? '' ?>">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tempat"
                            class="form-control"
                            value="<?= $data['tempat'] ?? '' ?>">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tanggal"
                            class="form-control"
                            value="<?= $data['tanggal'] ?? '' ?>">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Jenis Kelamin</label>
                            <input type="text" name="jk"
                            class="form-control"
                            value="<?= $data['jk'] ?? '' ?>">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Agama</label>
                            <input type="text" name="agama"
                            class="form-control"
                            value="<?= $data['agama'] ?? '' ?>">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>No HP</label>
                            <input type="text" name="hp"
                            class="form-control"
                            value="<?= $data['hp'] ?? '' ?>">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>NIK</label>
                            <input type="text" name="nik"
                            class="form-control"
                            value="<?= $data['nik'] ?? '' ?>">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Alamat</label>
                            <textarea name="alamat"
                            class="form-control"
                            rows="3"><?= $data['alamat'] ?? '' ?></textarea>
                        </div>

                    </div>

                    <button name="simpan_biodata"
                    class="btn btn-primary px-4">
                        Simpan Biodata
                    </button>

                </form>

            </div>
        </div>

        <!-- MASTER DATA -->
        <div class="card shadow-sm border-0">

            <div class="card-header bg-success text-white">
                <h5 class="mb-0">
                    Master Data Mata Kuliah
                </h5>
            </div>

            <div class="card-body">

                <form method="POST" class="row g-3 mb-4">

                    <div class="col-md-3">
                        <input type="text"
                        name="kode"
                        class="form-control"
                        placeholder="Kode Mata Kuliah">
                    </div>

                    <div class="col-md-6">
                        <input type="text"
                        name="nama_master"
                        class="form-control"
                        placeholder="Nama Mata Kuliah">
                    </div>

                    <div class="col-md-3">
                        <button name="tambah_master"
                        class="btn btn-success w-100">
                            Tambah Data
                        </button>
                    </div>

                </form>

                <div class="table-responsive">

                    <table class="table table-bordered table-hover align-middle">

                        <thead class="table-primary">
                            <tr>
                                <th width="70">No</th>
                                <th>Kode</th>
                                <th>Nama Mata Kuliah</th>
                                <th width="120">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                        <?php if(count($json['master']) > 0): ?>

                            <?php foreach($json['master'] as $i => $m): ?>

                            <tr>
                                <td><?= $i+1 ?></td>
                                <td><?= $m['kode'] ?></td>
                                <td><?= $m['nama'] ?></td>

                                <td>
                                    <a href="?hapus_master=<?= $i ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus data?')">
                                        Hapus
                                    </a>
                                </td>
                            </tr>

                            <?php endforeach; ?>

                        <?php else: ?>

                            <tr>
                                <td colspan="4" class="text-center text-muted">
                                    Belum ada data mata kuliah
                                </td>
                            </tr>

                        <?php endif; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

<?php include "partials/footer.php"; ?>

</body>
</html>