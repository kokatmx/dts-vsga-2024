<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Level User',
            'list' => ['Home', 'Level'],
        ];
        $page = (object)[
            'title' => 'Daftar level user yang terdaftar di sistem'
        ];
        $activeMenu = 'level';
        $user = User::all();
        $level = Level::all();
        return view('level.index', ['user' => $user, 'level' => $level, 'breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function list(Request $request)
    {
        // Load the level data and specify only the needed fields
        $levels = Level::select('level_id', 'level_nama');
        return DataTables::of($levels)
            ->addIndexColumn()
            ->addColumn('aksi', function ($level) {
                $btn  = '<a href="' . url('/level/' . $level->level_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/level/' . $level->level_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/level/' . $level->level_id) . '">'
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
            'title' => 'Tambah Level User',
            'list' => ['Home', 'Level', 'Tambah'],
        ];
        $page = (object)[
            'title' => 'Tambah level user baru'
        ];
        $activeMenu = 'user';
        return view('level.create', ['page' => $page, 'breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'level_id' => 'required|integer:level,level_id',
            'level_nama' => 'required|string|max:100|',
        ]);
        Level::create([
            'level_id' => $request->level_id,
            'level_nama' => $request->level_nama,
        ]);
        return redirect('/level')->with('success', 'Data user berhasil disimpan');
    }

    public function show(string $id)
    {
        $level = Level::find($id);
        $breadcrumb = (object)[
            'title' => 'Detail Level User',
            'list' => ['Home', 'Level', 'Detail'],
        ];
        $page = (object)[
            'title' => 'Detail level user'
        ];
        $activeMenu = 'level';
        return view('level.show', ['level' => $level, 'page' => $page, 'breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu]);
    }

    public function edit($id)
    {
        $level = Level::find($id);
        $breadcrumb = (object)[
            'title' => 'Edit Level User',
            'list' => ['Home', 'Level', 'Edit'],
        ];
        $page = (object)[
            'title' => 'Edit level user'
        ];
        $activeMenu = 'level';
        return view('level.edit', ['level' => $level, 'page' => $page, 'breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'level_nama' => 'required|string|max:100|',
        ]);
        Level::find($id)->update([
            'level_nama' => $request->level_nama,
        ]);
        return redirect('level')->with('success', 'Data user berhasil diubah');
    }

    public function destroy(string $id)
    {
        $check  = Level::find($id);
        if (!$check) {
            return redirect('level')->with('error', 'Data level user tidak ditemukan');
        }
        try {
            Level::destroy($id);
            return redirect('level')->with('success', 'Data level user berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('level')->with('error', 'Data level user gagal dihapus karena masih terdapat di tabel lain ');
        }
    }
}
