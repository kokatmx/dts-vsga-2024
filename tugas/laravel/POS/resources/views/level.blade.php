<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Data Level User</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Level Kode</th>
            <th>Level Nama</th>
        </tr>
        @foreach ($items as $item)
            <tr>
                <td>{{ $item->level_id }}</td>
                <td>{{ $item->level_kode }}</td>
                <td>{{ $item->level_nama }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>
