<?php
session_start();
include("inc_koneksi.php");

$username = "";
$password = "";
$err = "";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == '' || $password == '') {
        $err .= "<li>Silahkan masukan username dan password</li>";
    }

    if (empty($err)) {
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $q = mysqli_query($koneksi, $sql);
        $user = mysqli_fetch_array($q);

        if (!$user || $user['password'] != md5($password)) {
            $err .= "<li>Username atau password salah</li>";
        } else {
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            if ($user['role'] == 'admin') {
                header("Location: beranda_admin.html");
                exit();
            } elseif ($user['role'] == 'siswa') {
                header("Location: beranda.html");
                exit();
            } else {
                $err .= "<li>Peran pengguna tidak dikenali</li>";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="app">
        <h1>Halaman Login</h1>
        <?php
        if ($err) {
            echo "<ul>$err</ul>";
        }
        ?>
        <form action="" method="post">
            <input type="text" value="<?php echo htmlspecialchars($username) ?>" name="username" class="input" placeholder="Masukan username"/><br/><br/>
            <input type="password" name="password" class="input" placeholder="Masukan password"/><br/><br/>
            <input type="submit" name="login" value="Masuk ke sistem"/>
        </form>
    </div>
</body>
</html>