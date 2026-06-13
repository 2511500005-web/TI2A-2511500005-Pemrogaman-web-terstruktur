<<<<<<< HEAD
- <?php
include "config.php";

if(!isset($_SESSION['login'])){
    header("Location:index.php");
    exit;
}

$file = "data.json";

$json = file_exists($file)
? json_decode(file_get_contents($file), true)
: [];

if(!isset($json['users'])){
    $json['users'] = [];
}

$pesan = "";

if(isset($_POST['simpan'])){

    $lama = $_POST['password_lama'];
    $baru = $_POST['password_baru'];
    $konfirmasi = $_POST['konfirmasi'];

    foreach($json['users'] as $i => $u){

        if($u['username'] == $_SESSION['username']){

            if($u['password'] != $lama){

                $pesan = "Password lama salah!";

            }elseif($baru != $konfirmasi){

                $pesan = "Konfirmasi password tidak cocok!";

            }else{

                $json['users'][$i]['password'] = $baru;

                file_put_contents(
                    $file,
                    json_encode(
                        $json,
                        JSON_PRETTY_PRINT
                    )
                );

                $pesan = "Password berhasil diubah";

            }

            break;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<title>Ubah Password</title>

<link rel="stylesheet" href="assets/style.css">

</head>

<body>

<?php include "partials/header.php"; ?>

<?php include "partials/sidebar.php"; ?>

<div class="content">

<div class="card">

<h2>Ubah Password</h2>

<?php if($pesan!=""): ?>

<div
style="
padding:10px;
margin-bottom:15px;
background:#f1f1f1;
border-radius:8px;
">
<?= $pesan ?>
</div>

<?php endif; ?>

<form method="POST">

<div class="form-group">

<label>Password Lama</label>

<input
type="password"
name="password_lama"
required>

</div>

<br>

<div class="form-group">

<label>Password Baru</label>

<input
type="password"
name="password_baru"
required>

</div>

<br>

<div class="form-group">

<label>Konfirmasi Password</label>

<input
type="password"
name="konfirmasi"
required>

</div>

<br>

<button
type="submit"
name="simpan"
class="btn-simpan">

Simpan Password

</button>

</form>

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
? json_decode(file_get_contents($file), true)
: [];

if(!isset($json['users'])){
    $json['users'] = [];
}

$pesan = "";

if(isset($_POST['simpan'])){

    $lama = $_POST['password_lama'];
    $baru = $_POST['password_baru'];
    $konfirmasi = $_POST['konfirmasi'];

    foreach($json['users'] as $i => $u){

        if($u['username'] == $_SESSION['username']){

            if($u['password'] != $lama){

                $pesan = "Password lama salah!";

            }elseif($baru != $konfirmasi){

                $pesan = "Konfirmasi password tidak cocok!";

            }else{

                $json['users'][$i]['password'] = $baru;

                file_put_contents(
                    $file,
                    json_encode(
                        $json,
                        JSON_PRETTY_PRINT
                    )
                );

                $pesan = "Password berhasil diubah";

            }

            break;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<title>Ubah Password</title>

<link rel="stylesheet" href="assets/style.css">

</head>

<body>

<?php include "partials/header.php"; ?>

<?php include "partials/sidebar.php"; ?>

<div class="content">

<div class="card">

<h2>Ubah Password</h2>

<?php if($pesan!=""): ?>

<div
style="
padding:10px;
margin-bottom:15px;
background:#f1f1f1;
border-radius:8px;
">
<?= $pesan ?>
</div>

<?php endif; ?>

<form method="POST">

<div class="form-group">

<label>Password Lama</label>

<input
type="password"
name="password_lama"
required>

</div>

<br>

<div class="form-group">

<label>Password Baru</label>

<input
type="password"
name="password_baru"
required>

</div>

<br>

<div class="form-group">

<label>Konfirmasi Password</label>

<input
type="password"
name="konfirmasi"
required>

</div>

<br>

<button
type="submit"
name="simpan"
class="btn-simpan">

Simpan Password

</button>

</form>

</div>

</div>

<?php include "partials/footer.php"; ?>

</body>
>>>>>>> 927050f957227fb1c96bfdf6e8ba7fc8aa977e5e
</html>