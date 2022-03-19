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
            <td>Name</td>
            <td>:</td>
            <td><?= $crud['name'] ?></td>
        </tr>
        <tr>
            <td>Age</td>
            <td>:</td>
            <td><?= $crud['age'] ?></td>
        </tr>
        <tr>
            <td>Address</td>
            <td>:</td>
            <td><?= $crud['address'] ?></td>
        </tr>
    </table>
</body>
</html>