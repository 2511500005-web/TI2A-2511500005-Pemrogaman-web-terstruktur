<div class="sidebar">
<a href="dashboard.php">Dashboard</a>
<a href="jadwal.php">Jadwal</a>
<?php if($_SESSION['role']=="guru"): ?>
<a href="kelas.php">Kelas</a>
<?php endif; ?>
<a href="logout.php">Logout</a>
</div>