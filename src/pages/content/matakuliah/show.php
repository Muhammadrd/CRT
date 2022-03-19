<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail matakuliah</title>
</head>

<body>
    <a href="/crud">Kembali</a>
    <table>
        <tr>
            <td>Nama Matakuliah</td>
            <td>:</td>
            <td><?= $crud_matakuliah['mata_kuliah'] ?></td>
        </tr>
        <tr>
            <td>SKS</td>
            <td>:</td>
            <td><?= $crud_matakuliah['sks'] ?></td>
        </tr>
        <tr>
            <td>Dosen Pengampu</td>
            <td>:</td>
            <td><?= $crud_matakuliah['dosen'] ?></td>
        </tr>
    </table>
</body>

</html>