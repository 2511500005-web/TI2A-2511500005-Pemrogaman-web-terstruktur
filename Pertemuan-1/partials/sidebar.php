

<div class="sidebar">
<h3>Akses</h3>

<?php if($_SESSION['role']=="guru"): ?>
<b>Menu Guru</b>
<a href="dashboard.php">Dashboard</a>
<a href="kelas.php">Kelas</a>
<a href="jadwal.php">Jadwal</a>
<?php else: ?>
<b>Menu Siswa dan Guru</b>
<a href="dashboard.php">Dashboard</a>
<a href="jadwal.php">Jadwal</a>
<?php endif; ?>

<hr>
<a href="logout.php">Logout</a>
</div>