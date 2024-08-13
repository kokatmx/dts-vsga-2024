<div>
    <table>
        <tr>
            <th>Anggota ID</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>Tanggal Lahir</th>
            <th>Nilai</th>
        </tr>
        @forelse ($data as $item)
            <tr>
                <td>{{ $item->anggota_id }}</td>
                <td>{{ $item->nip }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->tanggal_lahir }}</td>
                <td>{{ $item->nilai }}</td>
            </tr>
        @empty
            <h3>Tidak ada data</h3>
        @endforelse
    </table>
</div>
