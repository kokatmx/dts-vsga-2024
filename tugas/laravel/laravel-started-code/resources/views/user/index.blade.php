@extends('layouts/template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('user/create') }}">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label for="level_id" class="col-1 control-label col-form-label">Filter: </label>
                        <div class="col-3">
                            <select name="level_id" id="level_id" class="form-control" required>
                                <option value="">-Semua-</option>
                                @foreach ($level as $item)
                                    <option value="{{ $item->level_id }}">{{ $item->level_nama }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Level Pengguna</small>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped table-hover table-sm" id="table_user">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Level Pengguna</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->user_id }}</td>
                            <td>{{ $user->nama }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->level->level_nama }}</td>
                            <td>
                                <a href="{{ url('user/' . $user->user_id) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ url('user/' . $user->user_id . '/edit') }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ url('user/' . $user->user_id) }}" method="post" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah Anda yakin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table_user') / DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('user/list') }}",
                    type: "POST"
                    data: function(d) {
                        d.level_id = $('#level_id').val();;
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'username',
                        name: 'username'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'level/level_nama',
                        name: 'level_nama'
                    },
                    {
                        data: 'aksi',
                        name: 'aksi'
                    }
                ],
                language: {
                    search: "🔍 Search:",
                    lengthMenu: "Show _MENU_ entries",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries"
                },
                responsive: true,
            });
            $('#level_id').on('change', function() {
                dataUser.ajax.reload();
            });
        });
    </script>
@endpush
