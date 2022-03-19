<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Matakuliah</title>
</head>

<body>
    <a href="/matakuliah">Kembali</a>
    <form action="/matakuliah/<?= $crud_matakuliah['id'] ?>/update" method="post">
        <label for="">Nama Matakuliah</label><br>
        <input type="text" name="mata_kuliah" id="" value="<?= $crud_matakuliah['mata_kuliah'] ?>"><br><br>
        <label for="">SKS</label><br>
        <input type="text" name="sks" min="1" id="" value="<?= $crud_matakuliah['sks'] ?>"><br><br>
        <label for="">Dosen Pengempu</label><br>
        <input type="text" name="dosen" value="<?= $crud_matakuliah['dosen'] ?>"><br><br>
        <button type="submit">Submit</button>
    </form>
</body>

</html>