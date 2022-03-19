<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Data Kelas</title>
</head>

<body>
    <a href="/kelas">Kembali</a>
    <table>
        <tr>
            <td>Nama mahasiswa</td>
            <td>:</td>
            <td><?= $crud_kelas['nama'] ?></td>
        </tr>
        <tr>
            <td>Matakuliah</td>
            <td>:</td>
            <td><?= $crud_kelas['mata_kuliah'] ?></td>
        </tr>
    </table>
</body>

</html>