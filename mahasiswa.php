<?php
include 'config/database.php';
include 'views/header.php';

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id=$id");
    header("Location: mahasiswa.php");
    exit;
}

$result = mysqli_query($conn, "
  SELECT m.*, j.nama AS jurusan 
  FROM mahasiswa m 
  JOIN jurusan j ON m.jurusan_id=j.id
");
?>
<h2>Data Mahasiswa</h2>
<a href="views/mahasiswa/create.php">+ Tambah Mahasiswa</a>
<table border="1" cellpadding="5">
  <tr><th>ID</th><th>Nama</th><th>Jurusan</th><th>Umur</th><th>Aksi</th></tr>
  <?php while($row = mysqli_fetch_assoc($result)): ?>
  <tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['nama'] ?></td>
    <td><?= $row['jurusan'] ?></td>
    <td><?= $row['umur'] ?></td>
    <td>
      <a href="views/mahasiswa/edit.php?id=<?= $row['id'] ?>">Edit</a> |
      <a href="mahasiswa.php?hapus=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
    </td>
  </tr>
  <?php endwhile; ?>
</table>
<?php include 'views/footer.php'; ?>
