<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
</head>

<body>
    <a href="/crud">Kembali</a>
    <form action="/crud/store" method="post">
        <label for="">Name</label><br>
        <input type="text" name="name" id=""><br><br>
        <label for="">Age</label><br>
        <input type="number" name="age" min="1" id=""><br><br>
        <label for="">Address</label><br>
        <textarea name="address" id="" cols="30" rows="10"></textarea><br><br>
        <button type="submit">Submit</button>
    </form>
</body>

</html>