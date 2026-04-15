<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "db_helpdesk";

$conn = mysqli_connect($host, $username, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>