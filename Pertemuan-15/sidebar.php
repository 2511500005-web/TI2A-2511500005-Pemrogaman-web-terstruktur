- <div class="sidebar">

<h3>Akses</h3>

<?php if($_SESSION['role']=="admin"): ?>

<b>Menu Admin</b>

<a href="dashboard.php">Dashboard</a>

<a href="jadwal.php">Jadwal</a>

<a href="detail_jadwal.php">
Detail Jadwal
</a>

<a href="cetak_jadwal.php">
Cetak Jadwal
</a>

<a href="ekstraNimAnda.php">
Ekstrakurikuler
</a>

<?php elseif($_SESSION['role']=="guru"): ?>

<b>Menu Guru</b>

<a href="dashboard.php">Dashboard</a>

<a href="kelas.php">Kelas</a>

<a href="jadwal.php">Jadwal</a>

<a href="lihat_jadwal.php">
Jadwal Saya
</a>

<a href="detail_jadwal.php">
Detail Jadwal
</a>

<a href="ekstraNimAnda.php">
Ekstrakurikuler
</a>

<?php else: ?>

<b>Menu Mahasiswa</b>

<a href="dashboard.php">Dashboard</a>

<a href="lihat_jadwal.php">
Jadwal Kelas
</a>

<a href="detail_jadwal.php">
Detail Jadwal
</a>

<a href="ekstraNimAnda.php">
Ekstrakurikuler
</a>

<?php endif; ?>

<hr>

<a href="logout.php">
Logout
</a>

</div>