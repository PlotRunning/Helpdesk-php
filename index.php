<?php
include "koneksi.php";
// cek apakah tombol kirim sudah ditekan
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // ambil data dari form
    $nama = $_POST["nama"];
    $laporan = $_POST["laporan"];

    $query = "INSERT INTO pengaduan (nama, laporan) VALUES ('$nama', '$laporan')";

    if (mysqli_query($conn, $query)) {
        echo "<div style='color: green;'><b>Sukses!</b>Laporan dari<b>$nama</b>telah diterima: <i>$laporan</i></div><hr>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
    // simpan data ke database atau lakukan proses lainnya
    // ...

    // tampilkan pesan sukses
    echo "<div style='color: green;'><b>Sukses!</b>Laporan dari<b>$nama</b>telah diterima: <i>$laporan</i></div><hr>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pengaduan -Helpdesk</title>
</head>
<body>
    <h1>Kirim Lapotan Pengaduan</h1>
    <form>
        <label>Nama anda</label><br>
        <input type="text" name="nama" placeholder="Masukan nama... "><br><br>

        <label>Laporan</label><br>
        <textarea name="laporan" placeholder="Tulis kendala Anda di sini..."></textarea><br><br>

        <button type="submit">Kirim Sekarang</button>

    </form>
</body>
</html>