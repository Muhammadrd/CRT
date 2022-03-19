<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Matakuliah</title>
</head>

<body>
  <h1>Matakuliah</h1>
  <a href="/matakuliah/create">Tambah</a> | <a href="/crud">Data Mahasiswa</a> | <a href="/kelas">Data Kelas</a>
  <table border="1">
    <tr>
      <td>No</td>
      <td>Nama Matakuliah</td>
      <td>SKS</td>
      <td>Dosen Pengampu</td>
      <td>Action</td>
    </tr>
    <?php foreach ($crud_matakuliah->items as $key => $value) { ?>
      <tr>
        <td><?= $key += 1 ?></td>
        <td><?= $value['mata_kuliah'] ?></td>
        <td><?= $value['sks'] ?></td>
        <td><?= $value['dosen'] ?></td>
        <td>
          <a href="/matakuliah/<?= $value['id'] ?>/show">Detail</a> | <a href="/matakuliah/<?= $value['id'] ?>/edit">Edit</a> | <a href="/matakuliah/<?= $value['id'] ?>/delete">Hapus</a>
        </td>
      </tr>
    <?php } ?>
  </table>
</body>

</html>