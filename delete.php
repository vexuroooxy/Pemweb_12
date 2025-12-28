<?php
include 'koneksi.php';

if (isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "DELETE FROM diaz_tbtugas12 WHERE id = '$id'";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data berhasil dihapus'); window.location.href='dashboard.php';</script>";
    } else {
        echo "Error deleting record: " . mysqli_error($koneksi);
    }
}
?>