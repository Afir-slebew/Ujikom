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
    <title>List Eskul</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f8f9fa;
        }
        h3{
            font-family: Arial, Helvetica, sans-serif;
            color: black;
        }
        header {
            background-color: #3f42ef;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-bottom: 40px;
        }
        header h1 {
            font-size: 2.5rem;
            margin: 0;
        }

        .card-title {
            color: #3f42ef;
        }
        .card-text {
            color: #555;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
        }

        .card-body {
            padding: 20px;
        }
        .back-button {
        text-decoration: none;
        color: white;
        background-color: #3f42ef;
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 1rem;
        font-weight: bold;
        display: inline-block;
        margin: 20px auto;
        text-align: center;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
        transition: background-color 0.3s ease-in-out;
        display: block;
        width: 200px;
        }

        .back-button:hover {
        background-color: #6f72ff;
        }
        .btn-primary {
            background-color: #3f42ef;
            border: none;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #6f72ff;
        }
        footer {
        background-color: #3f42ef;
        color: white;
        text-align: center;
        padding: 10px 0;
        font-size: 1rem;
        width: 100%;
        box-shadow: 0px -4px 6px rgba(0, 0, 0, 0.2);
}
    </style>
</head>
<body>

    <header>
        <h1>Daftar Ekstrakurikuler</h1>
    </header>
    <div class="container">
        <div class="row">
            <?php
            while ($row = mysqli_fetch_assoc($query)) {
                echo "<div class='col-md-4 mb-4'>";
                echo "<div class='card'>";
                echo "<div class='card-body'>";
                echo "<h3 class='card-title'>{$row['nama_eskul']}</h3>";
                echo "<p class='card-text'>Pembina: {$row['nama_pembina']}</p>";
                echo "<p class='card-text'>Tentang: {$row['tahun_didirikan']}</p>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
        <a href="beranda.html" class="back-button">Kembali ke Beranda</a>
    </div>
    <footer class="footer">
        <p>UJIKOM - Firdaus Hardiansyah</p>
    </footer>
</html>
