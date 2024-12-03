<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "eskul";
$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
$query = "SELECT * FROM formulir";
$result = mysqli_query($connection, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin - Data Pendaftar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Data Pendaftar Ekstrakurikuler</h1>
        <div class="mt-4">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Nomor HP</th>
                        <th>Ekstrakurikuler</th>
                        <th>Motivasi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $no++ . "</td>";
                            echo "<td>" . htmlspecialchars($row['namasiswa']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['kelas']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['nomorhp']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['eskul']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['motivasi']) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' class='text-center'>Tidak ada data</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="text-center mt-4">
            <a href="beranda_admin.html" class="btn btn-primary">Kembali ke Beranda</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
// Tutup koneksi
mysqli_close($connection);
?>
