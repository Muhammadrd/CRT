<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="/crud">Kembali</a>
    <table>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><?= $crud_mahasiswa['nama'] ?></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>:</td>
            <td><?= $crud_mahasiswa['kelas'] ?></td>
        </tr>
        <tr>
            <td>Jurusan</td>
            <td>:</td>
            <td><?= $crud_mahasiswa['jurusan'] ?></td>
        </tr>
    </table>
</body>

</html>