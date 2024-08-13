<div>
    <h1>Data Level User</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Nama</th>
            <th>ID Level User</th>
            <th>Kode Level</th>
            <th>Nama Level</th>
        </tr>
        @foreach ($data as $item)
            <tr>
                <td>{{ $item->user_id }}</td>
                <td>{{ $item->username }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->level_id }}</td>
                <td>{{ $item->level->level_kode }}</td>
                <td>{{ $item->level->level_nama }}</td>
            </tr>
        @endforeach
    </table>
</div>
