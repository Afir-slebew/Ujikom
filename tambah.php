<?php
include("inc_koneksi.php");

if (isset($_POST['simpan'])) {
    $nama_eskul = $_POST['nama_eskul'];
    $nama_pembina = $_POST['nama_pembina'];
    $tahun_didirikan = $_POST['tahun_didirikan'];

    $sql = "INSERT INTO dataeskul (nama_eskul, nama_pembina, tahun_didirikan) VALUES ('$nama_eskul', '$nama_pembina', '$tahun_didirikan')";
    if (mysqli_query($koneksi, $sql)) {
        header("Location: halaman_admin.php");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Eskul</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Tambah Data Ekstrakurikuler</h1>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="nama_eskul" class="form-label">Nama Eskul</label>
                <input type="text" name="nama_eskul" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nama_pembina" class="form-label">Nama Pembina</label>
                <input type="text" name="nama_pembina" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="tahun_didirikan" class="form-label">Tentang</label>
                <input type="text" name="tahun_didirikan" class="form-control" required>
            </div>
            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
            <a href="halaman_admin.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
