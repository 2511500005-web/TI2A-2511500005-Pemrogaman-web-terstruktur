- <?php
include "config.php";

if(isset($_SESSION['login'])){
    header("Location: dashboard.php");
    exit;
}

if(isset($_POST['login'])){

    $user = $_POST['username'];
    $role = $_POST['role'];

    if(!empty($user)){

        $_SESSION['login'] = true;
        $_SESSION['username'] = $user;
        $_SESSION['role'] = $role;

        /* KELAS DEFAULT SISWA */
        if($role == "siswa"){
            $_SESSION['kelas'] = "TI2A";
        }

        header("Location: dashboard.php");
        exit;

    } else {

        $error = "Login gagal, username wajib diisi!";

    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Login</title>

<link rel="stylesheet" href="assets/style.css">

</head>

<body class="login-body">

<div class="login-box">

    <h2>Login Sistem</h2>

    <?php if(isset($error)): ?>

    <div class="error">
        <?= $error ?>
    </div>

    <?php endif; ?>

    <form method="POST">

        <div class="input-group">

            <label>Username</label>

            <input
            type="text"
            name="username"
            placeholder="Masukkan username">

        </div>

        <div class="input-group">

            <label>Password</label>

            <input
            type="password"
            name="password"
            placeholder="Masukkan password">

        </div>

        <div class="input-group">

            <label>Role</label>

            <select name="role">

                <option value="admin">Admin</option>

                <option value="siswa">
                    Mahasiswa
                </option>

                <option value="guru">
                    Guru
                </option>

            </select>

        </div>

        <div class="btn-group">

            <button
            type="submit"
            name="login"
            class="btn-login">

                Login

            </button>

            <button
            type="button"
            class="btn-reset"
            onclick="alert('Reset password berhasil')">

                Reset

            </button>

        </div>

    </form>

</div>

</body>
</html>