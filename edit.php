<?php
include("inc_koneksi.php");

if (isset($_GET['eskul_id'])) {
    $eskul_id = $_GET['eskul_id'];
    $sql = "SELECT * FROM dataeskul WHERE eskul_id = '$eskul_id'";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_assoc($query);
}

if (isset($_POST['update'])) {
    $nama_eskul = $_POST['nama_eskul'];
    $nama_pembina = $_POST['nama_pembina'];
    $tahun_didirikan = $_POST['tahun_didirikan'];

    $sql = "UPDATE dataeskul SET nama_eskul = '$nama_eskul', nama_pembina = '$nama_pembina', tahun_didirikan = '$tahun_didirikan' WHERE eskul_id = '$eskul_id'";
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
    <title>Edit Data Eskul</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Edit Data Ekstrakurikuler</h1>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="nama_eskul" class="form-label">Nama Eskul</label>
                <input type="text" name="nama_eskul" class="form-control" value="<?php echo $data['nama_eskul']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="nama_pembina" class="form-label">Nama Pembina</label>
                <input type="text" name="nama_pembina" class="form-control" value="<?php echo $data['nama_pembina']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="tahun_didirikan" class="form-label">Tentang</label>
                <input type="text" name="tahun_didirikan" class="form-control" value="<?php echo $data['tahun_didirikan']; ?>" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
            <a href="halaman_admin.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
