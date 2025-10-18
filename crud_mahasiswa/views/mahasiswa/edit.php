<?php
include '../../config/database.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id=$id"));
$jurusan = mysqli_query($conn, "SELECT * FROM jurusan");

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $jurusan_id = $_POST['jurusan_id'];
    $umur = $_POST['umur'];
    mysqli_query($conn, "UPDATE mahasiswa SET nama='$nama', jurusan_id='$jurusan_id', umur='$umur', updated_at=NOW() WHERE id=$id");
    header("Location: ../../mahasiswa.php");
}
?>
<<body>
  <div class="container">
    <h2>Edit Data Mahasiswa</h2>
    <form method="post">
      <label>Nama:</label>
      <input type="text" name="nama" value="<?= $data['nama']; ?>" required>

      <label>Jurusan:</label>
      <select name="jurusan_id" required>
        <?php while($row = mysqli_fetch_assoc($jurusan)): ?>
          <option value="<?= $row['id']; ?>" 
            <?= $row['id'] == $data['jurusan_id'] ? 'selected' : ''; ?>>
            <?= $row['nama']; ?>
          </option>
        <?php endwhile; ?>
      </select>

      <label>Umur:</label>
      <input type="number" name="umur" value="<?= $data['umur']; ?>" required>

      <button type="submit" name="update">Perbarui</button>
      <button type="reset" class="reset-btn">Reset</button>

      <div class="back-container">
        <a href="../../mahasiswa.php" class="back-link">← Kembali</a>
        <link rel="stylesheet" href="../../public/css/mahasiswa-edit.css">
      </div>
    </form>
  </div>
</body>


