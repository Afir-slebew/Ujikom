<?php
include("inc_koneksi.php");
if (isset($_GET['eskul_id'])) {
    $eskul_id = $_GET['eskul_id'];
    $sql = "DELETE FROM dataeskul WHERE eskul_id = '$eskul_id'";
    if (mysqli_query($koneksi, $sql)) {
        header("Location: halaman_admin.php");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
