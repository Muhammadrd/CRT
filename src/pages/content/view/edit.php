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
    <form action="/crud/<?= $crud_mahasiswa['id'] ?>/update" method="post">
        <label for="">Nama</label><br>
        <input type="text" name="nama" id="" value="<?= $crud_mahasiswa['nama'] ?>"><br><br>
        <label for="">Kelas</label><br>
        <input type="text" name="kelas" min="1" id="" value="<?= $crud_mahasiswa['kelas'] ?>"><br><br>
        <label for="">Jurusan</label><br>
        <input type="text" name="jurusan" value="<?= $crud_mahasiswa['jurusan'] ?>"><br><br>
        <button type="submit">Submit</button>
    </form>
</body>

</html>