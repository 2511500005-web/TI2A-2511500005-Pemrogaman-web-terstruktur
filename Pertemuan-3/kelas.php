<?php include "config.php";
if($_SESSION['role']!="guru") header("Location:dashboard.php"); ?>

<html>
<head><link rel="stylesheet" href="assets/style.css"></head>
<body>

<?php include "partials/header.php"; ?>
<?php include "partials/sidebar.php"; ?>

<div class="content">
<h2>Absensi Mahasiswa</h2>

<table>
<tr><th>No</th><th>NIM</th><th>Status</th></tr>

<?php for($i=1;$i<=31;$i++):
$nim=str_pad($i,3,"0",STR_PAD_LEFT); ?>

<tr>
<td><?= $i ?></td>
<td><?= $nim ?></td>
<td>
<select onchange="ubahWarna(this)">
<option></option>
<option value="hadir">Hadir</option>
<option value="izin">Izin</option>
<option value="alpa">Alpa</option>
</select>
</td>
</tr>

<?php endfor; ?>

</table>
</div>

<?php include "partials/footer.php"; ?>
</body>
</html>