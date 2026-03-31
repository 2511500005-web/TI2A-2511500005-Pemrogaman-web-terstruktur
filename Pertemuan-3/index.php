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
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link"><i class="nav-icon fas fa-book"></i><p>Master<i class="right fas fa-angle-left"></i></p></a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="index.php?page=mapel" class="nav-link"><p>Mata Pelajaran</p></a></li>
              <li class="nav-item"><a href="#" class="nav-link"><p>Guru</p></a></li>
              <li class="nav-item"><a href="index.php?page=mahasiswa" class="nav-link"><p>Siswa</p></a></li>
              <li class="nav-item"><a href="#" class="nav-link"><p>Kelas</p></a></li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link"><i class="nav-icon fas fa-calendar"></i><p>Transaksi<i class="right fas fa-angle-left"></i></p></a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="index.php?page=jadwal" class="nav-link"><p>Jadwal</p></a></li>
            </ul>
          </li>
          <li class="nav-item"><a href="http://localhost/phpmyadmin/index.php?route=/export" target="_blank" class="nav-link"><i class="nav-icon fas fa-database"></i><p>Database Export</p></a></li>
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
                include "page/dashboard.php";
            } else if (file_exists("page/$page.php")) {
                include "page/$page.php";
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