<?php
include "koneksi.php";

$id = $_GET['id'];
$query = "DELETE FROM pengaduan WHERE id='$id'";
if (mysqli_query($conn, $query)) {
    header("Location: index.php");
} else {
    echo "Gagal menghapus data: " . 
     mysqli_error($conn);
}
?>