<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $namasiswa = isset($_POST['namasiswa']) ? $_POST['namasiswa'] : '';
    $kelas = isset($_POST['kelas']) ? $_POST['kelas'] : '';
    $nomorhp = isset($_POST['nomorhp']) ? $_POST['nomorhp'] : '';
    $eskul = isset($_POST['eskul']) ? $_POST['eskul'] : '';
    $motivasi = isset($_POST['motivasi']) ? $_POST['motivasi'] : '';

    if ($namasiswa === '' || $nomorhp === '') {
        echo "<center style='color: red;'>Nama siswa dan nomor HP wajib diisi!</center>";
    } else {
        $db_host = "localhost";
        $db_user = "root";
        $db_pass = "";
        $db_name = "eskul";
        $connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
        if (!$connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $namasiswa = mysqli_real_escape_string($connection, $namasiswa);
        $kelas = mysqli_real_escape_string($connection, $kelas);
        $nomorhp = mysqli_real_escape_string($connection, $nomorhp);
        $eskul = mysqli_real_escape_string($connection, $eskul);
        $motivasi = mysqli_real_escape_string($connection, $motivasi);
        $query = "INSERT INTO formulir (namasiswa, kelas, nomorhp, eskul, motivasi)
                  VALUES ('$namasiswa', '$kelas', '$nomorhp', '$eskul', '$motivasi')";
        if (mysqli_query($connection, $query)) {
            echo "<center style='color: green;'>Pendaftaran Berhasil</center>";
            echo "<center><a href='beranda.html' style='text-decoration: none;'>
                  <button style='padding: 10px 20px; background-color: blue; color: white; border: none; border-radius: 5px;'>Kembali ke Beranda</button>
                  </a></center>";
        } else {
            echo "Error: " . mysqli_error($connection);
        }
        mysqli_close($connection);
    }
}
?>