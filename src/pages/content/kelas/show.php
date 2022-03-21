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
            <td>Nama Mahasiswa Baru</td>
            <td>:</td>
            <td><?= $crud_kelas['nama'] ?></td>
        </tr>

        <tr>
            <td>Matakuliah </td>
            <td>:</td>
            <?php foreach ($arr_kos as $key => $value) { ?>
                <td><?= $value['mata_kuliah'] ?> , </td>
            <?php } ?>
        </tr>



    </table>
</body>

</html>