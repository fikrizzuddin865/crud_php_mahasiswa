<?php
include '../../config/database.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM jurusan WHERE id=$id"));

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    mysqli_query($conn, "UPDATE jurusan SET nama='$nama', updated_at=NOW() WHERE id=$id");
    header("Location: ../../jurusan.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Jurusan</title>
  <link rel="stylesheet" href="../../public/css/jurusan-edit.css">
</head>
<body>
  <div class="container">
    <h2>Edit Data Jurusan</h2>
    <form method="post" action="">
      <label>Nama Jurusan:</label>
      <input type="text" name="nama" value="<?= $data['nama']; ?>" required>

      <button type="submit" name="update">Perbarui</button>
      <button type="reset" class="reset-btn">Reset</button>

      <div class="back-container">
        <a href="../../jurusan.php" class="back-link">← Kembali</a>
      </div>
    </form>
  </div>
</body>
</html>
