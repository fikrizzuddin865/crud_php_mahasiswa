<?php
include '../../config/database.php'; // pastikan path benar

if (isset($_POST['submit'])) {
  $nama = trim($_POST['nama']);

  if (!empty($nama)) {
    $query = "INSERT INTO jurusan (nama, created_at) VALUES ('$nama', NOW())";
    $result = mysqli_query($conn, $query);

    if ($result) {
      // redirect ke halaman utama setelah berhasil
      header("Location: ../../jurusan.php");
      exit;
    } else {
      echo "<script>alert('Gagal menyimpan data!');</script>";
    }
  } else {
    echo "<script>alert('Nama jurusan tidak boleh kosong!');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Jurusan</title>
  <link rel="stylesheet" href="../../public/css/jurusan-create.css">
</head>
<body>
  <div class="container">
    <h2>Tambah Data Jurusan</h2>
    <form method="post" action="">
      <label>Nama Jurusan:</label>
      <input type="text" name="nama" placeholder="Masukkan nama jurusan" required>

      <button type="submit" name="submit">Simpan</button>

      <div class="back-container">
        <a href="../../jurusan.php" class="back-link">← Kembali</a>
      </div>
    </form>
  </div>
</body>
</html>
