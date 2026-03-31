<?php
session_start();

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_destroy();
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $_SESSION['username'] = $_POST['username'] ?: 'Guest';
    header('Location: index.php');
    exit;
}

$logged_in = isset($_SESSION['username']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>AdminLTE 3 | Starter</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition <?php echo $logged_in ? 'sidebar-mini' : 'login-page'; ?>">

<?php if (!$logged_in): ?>
<div class="login-box">
  <div class="login-logo"><b>Admin</b>LTE</div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <form method="post" action="index.php">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username">
          <div class="input-group-append"><div class="input-group-text"><span class="fas fa-user"></span></div></div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append"><div class="input-group-text"><span class="fas fa-lock"></span></div></div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php else: ?>
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item d-none d-sm-inline-block"><a href="index.php" class="nav-link active">Home</a></li>
    </ul>
  </nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index.php" class="brand-link"><span class="brand-text font-weight-light">AdminLTE 3</span></a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info"><a href="#" class="d-block"><?= $_SESSION['username'] ?></a></div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
          <li class="nav-item">
            <a href="index.php?page=mahasiswa" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Kehadiran Mahasiswa</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?page=jadwal" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>Jadwal Kuliah</p>
            </a>
          </li>
          <li class="nav-item"><a href="index.php?action=logout" class="nav-link"><i class="nav-icon fas fa-sign-out-alt"></i><p>Logout</p></a></li>
        </ul>
      </nav>
    </div>
  </aside>

  <div class="content-wrapper">
    <section class="content-header"><div class="container-fluid"><h1>Dashboard</h1></div></section>
    <section class="content">
      <div class="card">
        <div class="card-body">
          <?php
            $page = isset($_GET['page']) ? $_GET['page'] : "";
            if ($page == "") {
                echo "<p>SELAMAT DATANG DI WEBSITE SEKOLAH</p>";
            } else if ($page == "mahasiswa") {
                echo "<h4>Daftar Kehadiran Mahasiswa</h4>";
                echo "<table class='table table-bordered'>
                        <thead>
                          <tr><th>No</th><th>Nama</th><th>Status Kehadiran</th></tr>
                        </thead><tbody>";
                for ($i=1; $i<=31; $i++) {
                    $nama = str_pad($i, 3, '0', STR_PAD_LEFT);
                    echo "<tr>
                            <td>$i</td>
                            <td>$nama</td>
                            <td>
                              <select class='form-control'>
                                <option>Hadir</option>
                                <option>Izin</option>
                                <option>Sakit</option>
                                <option>Alpa</option>
                              </select>
                            </td>
                          </tr>";
                }
                echo "</tbody></table>";
            } else if ($page == "jadwal") {
                echo "<h4>Jadwal Kuliah</h4>";
                echo "<table class='table table-striped'>
                        <thead>
                          <tr>
                            <th>No</th><th>Kode</th><th>Matakuliah</th><th>SKS</th>
                            <th>Kel.</th><th>Hari, Jam</th><th>Ruang</th><th>Pengajar</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr><td>1</td><td>IT202</td><td>Kalkulus 2</td><td>3</td><td>T12A</td><td>Senin, 08:00–09:30</td><td>2.2.4</td><td>R. Burham I. F., S.Si., M.Kom.</td></tr>
                          <tr><td>2</td><td>IF901</td><td>Algoritma dan Struktur Data</td><td>4</td><td>T12A</td><td>Senin, 13:00–16:30</td><td>LAB 3</td><td>Elza Budi Perkasa, M.Kom.</td></tr>
                          <tr><td>3</td><td>IT311</td><td>Pemrograman Web Terstruktur</td><td>3</td><td>T12A</td><td>Selasa, 13:00–15:30</td><td>LAB 3</td><td>Delpiah W., S.Kom., M.Kom.</td></tr>
                          <tr><td>4</td><td>IT305</td><td>Sistem Manajemen Basis Data</td><td>3</td><td>T12A</td><td>Rabu, 08:00–09:30</td><td>2.2.4</td><td>Metde Suci M., M.Kom.</td></tr>
                          <tr><td>5</td><td>IT306</td><td>Desain dan Pemrograman Mobile</td><td>3</td><td>T12A</td><td>Kamis, 08:00–09:30</td><td>LAB 4</td><td>Rezky Yuanda, M.Kom.</td></tr>
                          <tr><td>6</td><td>UM301</td><td>English For Business</td><td>3</td><td>T12A</td><td>Kamis, 13:00–15:30</td><td>2.1.6</td><td>Sintis B., S.Pd., M.Pd.</td></tr>
                          <tr><td>7</td><td>MT102</td><td>Agama</td><td>2</td><td>KRT</td><td>Jumat, 13:00–15:30</td><td>1.3.9</td><td>Shio Mulyadanti, M.Hum.</td></tr>
                        </tbody>
                      </table>
                      <p><strong>Jumlah SKS: 20</strong></p>";
            } else {
                echo "File Tidak Ditemukan";
            }
          ?>
        </div>
      </div>
    </section>
  </div>

  <footer class="main-footer">
    <strong>&copy; 2026 AdminLTE Template.</strong> All rights reserved.
  </footer>
</div>
<?php endif; ?>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>