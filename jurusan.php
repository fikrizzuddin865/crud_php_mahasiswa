<?php
include 'config/database.php';
include 'views/header.php';

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM jurusan WHERE id=$id");
    header("Location: jurusan.php");
    exit;
}

$result = mysqli_query($conn, "SELECT * FROM jurusan");
?>
<h2>Data Jurusan</h2>
<a href="views/jurusan/create.php">+ Tambah Jurusan</a>
<table border="1" cellpadding="5">
  <tr><th>ID</th><th>Nama</th><th>Aksi</th></tr>
  <?php while($row = mysqli_fetch_assoc($result)): ?>
  <tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['nama'] ?></td>
    <td>
      <a href="views/jurusan/edit.php?id=<?= $row['id'] ?>">Edit</a> |
      <a href="jurusan.php?hapus=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
    </td>
  </tr>
  <?php endwhile; ?>
</table>
<?php include 'views/footer.php'; ?>
