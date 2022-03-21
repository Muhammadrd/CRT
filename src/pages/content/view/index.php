<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Mahasiswa</title>
</head>

<body>
  <h1>Mahasiswa</h1>
  <a href="/crud/create">Tambah Data Mahasiswa</a>
  <table border="1">
    <tr>
      <td>No</td>
      <td>Nama</td>
      <td>Action</td>
    </tr>
    <?php foreach ($crud_mahasiswa->items as $key => $value) { ?>
      <tr>
        <td><?= $key += 1 ?></td>
        <td><?= $value['nama'] ?></td>
        <td>
          <a href="/crud/<?= $value['id'] ?>/show">Detail</a> | <a href="/crud/<?= $value['id'] ?>/edit">Edit</a> | <a href="/crud/<?= $value['id'] ?>/delete">Hapus</a>
        </td>
      </tr>
    <?php } ?>
  </table>
</body>

</html>