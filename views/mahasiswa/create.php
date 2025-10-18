<?php
include '../../config/database.php';
$jurusan = mysqli_query($conn, "SELECT * FROM jurusan");

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $jurusan_id = $_POST['jurusan_id'];
    $umur = $_POST['umur'];
    mysqli_query($conn, "INSERT INTO mahasiswa(nama, jurusan_id, umur) VALUES('$nama','$jurusan_id','$umur')");
    header("Location: ../../mahasiswa.php");
}
?>
<<form method="post">
  <label>Nama:</label>
  <input type="text" name="nama" required>

  <label>Jurusan:</label>
  <select name="jurusan_id" required>
    <?php while($row = mysqli_fetch_assoc($jurusan)): ?>
      <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
    <?php endwhile; ?>
  </select>

  <label>Umur:</label>
  <input type="number" name="umur" required>

  <button type="submit" name="simpan">Simpan</button>

  <!-- pindahkan link kembali ke bawah tombol simpan -->
  <div class="back-container">
    <a href="../../mahasiswa.php" class="back-link">← Kembali</a>
  </div>
</form>

<link rel="stylesheet" href="../../public/css/form.css">