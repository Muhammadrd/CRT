<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Data Matakuliah</title>
</head>

<body>
  <a href="/matakuliah">Kembali</a>
  <form action="/matakuliah/store" method="post">
    <label for="">Nama Matakuliah</label><br>
    <input type="text" name="matakuliah" id=""><br><br>
    <label for="">SKS</label><br>
    <input type="text" name="sks" min="1" id=""><br><br>
    <label for="">Dosen Pengampu</label><br>
    <input type="text" name="dosen"><br><br>
    <button type="submit">Submit</button>


  </form>
</body>

</html>