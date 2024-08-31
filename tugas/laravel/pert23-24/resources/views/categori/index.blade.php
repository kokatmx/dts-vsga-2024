@extends('layouts/template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('categori/create') }}">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <table class="table table-bordered table-striped table-hover table-sm" id="table_categori">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kode Kategori</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
@push('css')
@endpush

@push('js')
    <script>
        $(document).ready(function() {
            var dataUser =
                $('#table_categori').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        "url": "{{ url('categori/list') }}",
                        "dataType": "json",
                        "type": "POST",
                        "data": function(d) {
                            d.categori_id = $('#categori_id').val();;
                        }
                    },
                    columns: [{
                        data: "categori_id",
                        className: "text-center",
                        orderable: true,
                        searchable: true
                    }, {
                        data: "categori_code",
                        className: "",
                        orderable: false,
                        searchable: false
                    }, {
                        data: "categori_nama",
                        className: "",
                        orderable: true,
                        searchable: true
                    }, {
                        data: "aksi",
                        className: "",
                        orderable: false,
                        searchable: false
                    }],
                    language: {
                        search: "🔍 Search:",
                        lengthMenu: "Show _MENU_ entries",
                        info: "Showing _START_ to _END_ of _TOTAL_ entries"
                    },
                    responsive: true,
                });
            $('#categori_id').on('change', function() {
                dataUser.ajax.reload();
            });
        });
    </script>
@endpush
