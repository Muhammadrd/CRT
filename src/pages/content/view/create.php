<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Data</title>
</head>

<body>
  <a href="/crud">Kembali</a>
  <form action="/crud/store" method="post">
    <label for="">Nama</label><br>
    <input type="text" name="nama" id=""><br><br>
    <label for="">Kelas</label><br>
    <input type="text" name="kelas" min="1" id=""><br><br>
    <label for="">jurusan</label><br>
    <input type="text" name="jurusan"><br><br>
    <button type="submit">Submit</button>


  </form>
</body>

</html>