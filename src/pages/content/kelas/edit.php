<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Data Kelas</title>
</head>

<body>
    <a href="/kelas">Kembali</a>
    <form action="/kelas/<?= $mahasiswa['id']; ?>/update" method="post">
        <label for="">Nama Mahasiswa</label><br>
        <select name="nama" disabled>
            <?php foreach ($crud_mahasiswa->items as $key => $value) { ?>
                <option value="<?= $value['id'] ?>" <?= $value['id'] == $mahasiswa['id'] ? 'selected' : '' ?>><?= $value['nama'] ?></option>

            <?php } ?>
        </select> <br><br>
        <label for="">Mata Kuliah</label><br>
        <?php foreach ($crud_matakuliah->items as $key => $value) { ?>
            <input type='checkbox' name='mk[]' value="<?= $value['id'] ?>" <?= in_array($value['id'], $ar_matkul) ? 'checked' : '' ?> /> <?= $value['mata_kuliah'] ?><br>
        <?php } ?>


        <button type="submit">Submit</button>


    </form>
</body>

</html>