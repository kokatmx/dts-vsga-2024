@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @empty($categori)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
                <a href="{{ url('categori') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
            @else
                <form method="POST" action="{{ url('/categori/' . $categori->categori_id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group"> <label>Kategori Kode</label>
                        <input type="text" class="form-control" id="categori_code" name="categori_code"
                            value="{{ old('categori_code', $categori->categori_code) }}" required>
                        @error('categori_code')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group"> <label>Kategori Nama</label>
                        <input type="text" class="form-control" id="categori_nama" name="categori_nama"
                            value="{{ old('categori_nama', $categori->categori_nama) }}" required>
                        @error('categori_nama')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button> <a
                            class="btn btn-sm btn-default ml-1" href="{{ url('categori') }}">Kembali</a>
                    </div>
                </form>
            @endempty
        </div>
    </div>
@endsection

@push('css')
@endpush
@push('js')
@endpush
