<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Kelas</title>
</head>

<body>
  <h1>Kelas</h1>
  <a href="/kelas/create">Tambah Data</a> | <a href="/crud">Data Mahasiswa</a>| <a href="/matakuliah">Data Matakuliah</a>
  <table border="1">
    <tr>
      <td>No</td>
      <td>Nama Mahasiswa</td>
      <td>Mata Kuliah</td>
      <td>Action</td>
    </tr>
    <?php foreach ($crud_kelas->items as $key => $value) { ?>
      <tr>
        <td><?= $key += 1 ?></td>
        <td><?= $value['nama'] ?></td>
        <td><?= $value['mata_kuliah'] ?></td>
        <td>
          <a href="/kelas/<?= $value['id_mahasiswa'] ?>/show">Detail</a> | <a href="/kelas/<?= $value['id_matakuliah'] ?>/edit">Edit</a> | <a href="/kelas/<?= $value['id_kelas'] ?>/delete">Hapus</a>
        </td>
      </tr>
    <?php } ?>
  </table>
</body>

</html>