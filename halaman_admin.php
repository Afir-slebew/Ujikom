<?php
include("inc_koneksi.php");
$sql = "SELECT * FROM dataeskul";
$query = mysqli_query($koneksi, $sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body {
    font-family: 'Arial', sans-serif;
    background-color: #f9f9fb;
    color: #333;
    display: flex;
    flex-direction: column;
    align-items: center;
    min-height: 100vh;
}
.header-container {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    background: linear-gradient(90deg, #3f42ef, #6c63ff);
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    width: 100%;
}
.header-logo {
    width: 100px;
    height: auto;
    margin-right: 20px;
}
.header-text h1 {
    font-size: 2rem;
    font-weight: bold;
    color: white;
    margin-bottom: 5px;
    text-align: left;
}
.header-text h2 {
    font-size: 1rem;
    color: #e0e0e0;
    text-align: left;
}
main {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
    width: 90%;
    max-width: 1200px;
    margin: 20px auto;
    padding: 20px;
    background: white;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: white;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}
th, td {
    border: 1px solid #e0e0e0;
    padding: 15px;
    text-align: center;
    font-size: 0.9rem;
}
th {
    background-color: #3f42ef;
    color: white;
    text-transform: uppercase;
    font-weight: bold;
}
td {
    background-color: #f9f9fb;
}
td a {
    text-decoration: none;
    color: white;
    padding: 8px 12px;
    border-radius: 4px;
    font-size: 0.85rem;
    transition: background-color 0.3s ease;
}
.btn-success {
    background-color: #28a745;
}
.btn-success:hover {
    background-color: #218838;
}
.btn-primary {
    background-color: #007bff;
}
.btn-primary:hover {
    background-color: #0056b3;
}
.btn-danger {
    background-color: #dc3545;
}
.btn-danger:hover {
    background-color: #c82333;
}
.container {
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
}
.container a {
    align-self: flex-start;
    margin-bottom: 10px;
    text-decoration: none;
    color: white;
    background-color: #28a745;
    padding: 10px 15px;
    border-radius: 4px;
    transition: background-color 0.3s ease;
}
.container a:hover {
    background-color: #218838;
}
footer {
    width: 100%;
    padding: 10px 0;
    text-align: center;
    background-color: #3f42ef;
    color: white;
    font-size: 0.9rem;
    margin-top: auto;
    box-shadow: 0px -4px 6px rgba(0, 0, 0, 0.1);
}
    </style>
</head>
<body>
    <header>
        <div class="header-container">
            <img src="logo smp.png" alt="Logo sekolah" class="header-logo">
            <div class="header-text">
                <h1>Halaman Admin</h1>
                <h2>SMPN 2 DAYEUHKOLOT</h2>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <a href="tambah.php" class="btn-success">Tambah Data</a>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Eskul</th>
                        <th>Nama Pembina</th>
                        <th>Tentang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($query)) {
                        echo "<tr>";
                        echo "<td>{$no}</td>";
                        echo "<td>{$row['nama_eskul']}</td>";
                        echo "<td>{$row['nama_pembina']}</td>";
                        echo "<td>{$row['tahun_didirikan']}</td>";
                        echo "<td>
                            <a href='edit.php?eskul_id={$row['eskul_id']}' class='btn-primary'>Edit</a>
                            <a href='hapus.php?eskul_id={$row['eskul_id']}' class='btn-danger' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                        </td>";
                        echo "</tr>";
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
            <a href="beranda_admin.html" class="btn-success">Kembali ke Beranda</a>
        </div>
    </main>
    <footer>
        <p>UJIKOM - Firdaus Hardiansyah</p>
    </footer>
</body>
</html>
