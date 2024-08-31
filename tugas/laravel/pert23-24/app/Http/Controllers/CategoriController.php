<?php

namespace App\Http\Controllers;

use App\Models\Categori;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar Kategori',
            'list' => ['Home', 'Kategori'],
        ];
        $page = (object)[
            'title' => 'Daftar kategori yang terdaftar di sistem'
        ];
        $activeMenu = 'categori';
        $categori = Categori::all();
        return view('categori.index', ['categori' => $categori, 'breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }
    public function list()
    {
        $categories = Categori::select('categori_id', 'categori_code', 'categori_nama');
        return DataTables::of($categories)
            ->addIndexColumn()
            ->addColumn('aksi', function ($categori) {
                $btn  = '<a href="' . url('/categori/' . $categori->categori_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/categori/' . $categori->categori_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/categori/' . $categori->categori_id) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Tambah Kategori Barang',
            'list' => ['Home', 'Kategori', 'Tambah'],
        ];
        $page = (object)[
            'title' => 'Tambah kategori barang baru'
        ];
        $activeMenu = 'categori';
        return view('categori.create', ['page' => $page, 'breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'categori_code' => 'required|string|min:3|unique:categoris,categori_code',
            'categori_nama' => 'required|string|max:100|',
        ]);
        Categori::create([
            'categori_code' => $request->categori_code,
            'categori_nama' => $request->categori_nama,
        ]);
        return redirect('/categori')->with('success', 'Data user berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categori = Categori::find($id);
        $breadcrumb = (object)[
            'title' => 'Detail Kategori',
            'list' => ['Home', 'Kategori', 'Detail'],
        ];
        $page = (object)[
            'title' => 'Detail kategori barang'
        ];
        $activeMenu = 'categori';
        return view('categori.show', ['categori' => $categori, 'page' => $page, 'breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categori = Categori::find($id);
        $breadcrumb = (object)[
            'title' => 'Edit Kategori User',
            'list' => ['Home', 'Kategori', 'Edit'],
        ];
        $page = (object)[
            'title' => 'Edit categori user'
        ];
        $activeMenu = 'categori';
        return view('categori.edit', ['categori' => $categori, 'page' => $page, 'breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'categori_code' => 'required|string|max:100|',
            'categori_nama' => 'required|string|max:100|',
        ]);
        Categori::find($id)->update([
            'categori_code' => $request->categori_code,
            'categori_nama' => $request->categori_nama,
        ]);
        return redirect('categori')->with('success', 'Data user berhasil diubah');
    }

    public function destroy(string $id)
    {
        $check  = Categori::find($id);
        if (!$check) {
            return redirect('level')->with('error', 'Data level user tidak ditemukan');
        }
        try {
            Categori::destroy($id);
            return redirect('categori')->with('success', 'Data kategori barang berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('categori')->with('error', 'Data kategori barang gagal dihapus karena masih terdapat di tabel lain ');
        }
    }
}
