<?php
include 'koneksi.php';

// 1. Ambil ID dan amankan dari SQL Injection dasar
$id = mysqli_real_escape_string($conn, $_GET['id']);

// 2. Ambil data lama untuk ditampilkan di form
// Perbaikan: Tambahkan spasi sebelum WHERE
$query = "SELECT * FROM pengaduan WHERE id='$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Jika ID tidak ditemukan, balikkan ke index
if (!$row) {
    header("location:index.php");
    exit;
}

// 3. Proses Update jika tombol ditekan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $laporan = mysqli_real_escape_string($conn, $_POST['laporan']);

    // Perbaikan: Tambahkan spasi setelah nama tabel 'pengaduan' dan sebelum 'SET'
    $update = "UPDATE pengaduan SET nama='$nama', laporan='$laporan' WHERE id='$id'";

    if (mysqli_query($conn, $update)) {
        // Gunakan exit setelah header supaya script berhenti
        header("location:index.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Laporan</title>
</head>
<body>

    <h2>Edit Laporan</h2>

    <form method="POST">
        <label>Nama:</label><br>
        <input type="text" name="nama" value="<?php echo htmlspecialchars($row['nama']); ?>" required><br><br>
        
        <label>Laporan:</label><br>
        <textarea name="laporan" required><?php echo htmlspecialchars($row['laporan']); ?></textarea><br><br>
        
        <button type="submit">Simpan Perubahan</button>
        <a href="index.php">Batal</a>
    </form>

</body>
</html>