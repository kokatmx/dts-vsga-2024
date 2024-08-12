<div>
    <h1>Data Kategori</h1>
    <hr>
    <table border="1">
        <tr>
            <th>Kategori ID</th>
            <th>Kategori Kode</th>
            <th>Kategori nama</th>
        </tr>
        @foreach ($data as $item)
            <tr>
                <td>{{ $item->kategori_id }}</td>
                <td>{{ $item->kategori_kode }}</td>
                <td>{{ $item->kategori_nama }}</td>
            </tr>
        @endforeach
    </table>
</div>
