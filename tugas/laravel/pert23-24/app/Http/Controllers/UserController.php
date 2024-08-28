<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar User',
            'list' => ['Home', 'User'],
        ];
        $page = (object)[
            'title' => 'Daftar user yang terdaftar di sistem'
        ];
        $activeMenu = 'user';
        $user = User::all();
        $level = Level::all();
        return view('user.index', ['user' => $user, 'level' => $level, 'breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }
    // Ambil data user dalam bentuk json untuk datatables
    public function list(Request $request)
    {
        // Load the level data and specify only the needed fields
        $users = User::with('level:level_id,level_nama')->select('user_id', 'username', 'nama', 'level_id');

        // Apply the level filter if selected
        if ($request->level_id) {
            $users->where('level_id', $request->level_id);
        }

        return DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('level.level_nama', function ($user) {
                // Check if level relation exists
                return $user->level ? $user->level->level_nama : 'N/A';
            })
            ->addColumn('aksi', function ($user) {
                $btn  = '<a href="' . url('/user/' . $user->user_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/user/' . $user->user_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/user/' . $user->user_id) . '">'
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
            'title' => 'Tambah User',
            'list' => ['Home', 'User', 'Tambah'],
        ];
        $page = (object)[
            'title' => 'Tambah user baru'
        ];
        $activeMenu = 'user';
        $level = Level::all()->map(function ($item) {
            return (object)['level_id' => $item->level_id, 'level_nama' => $item->level_nama];
        });
        return view('user.create', ['level' => $level, 'page' => $page, 'breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|min:3|unique:users,username',
            'nama' => 'required|string|max:100|',
            'password' => 'required|min:5',
            'level_id' => 'required|integer',
        ]);
        User::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => bcrypt($request->password),
            'level_id' => $request->level_id,
        ]);
        return redirect('/user')->with('success', 'Data user berhasil disimpan');
    }
    public function show(string $id)
    {
        $user = User::with('level')->find($id);
        $breadcrumb = (object)[
            'title' => 'Detail User',
            'list' => ['Home', 'User', 'Detail'],
        ];
        $page = (object)[
            'title' => 'Detail user'
        ];
        $activeMenu = 'user';
        return view('user.show', ['user' => $user, 'page' => $page, 'breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu]);
    }
    public function edit(string $id)
    {
        $user = User::with('level')->find($id);
        $level = Level::all();
        $breadcrumb = (object)[
            'title' => 'Edit User',
            'list' => ['Home', 'User', 'Edit'],
        ];
        $page = (object)[
            'title' => 'Edit user'
        ];
        $activeMenu = 'user';
        return view('user.edit', ['user' => $user, 'level' => $level, 'page' => $page, 'breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu]);
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'username' => 'required|string|min:3|unique:users,username' . $id . 'user_id',
            'nama' => 'required|string|max:100|',
            'password' => 'nullable|min:5',
            'level_id' => 'required|integer',
        ]);
        User::find($id)->update([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => $request->password ? bcrypt($request->password) : User::find($id)->password,
            'level_id' => $request->level_id
        ]);
        return redirect('/user')->with('success', 'Data user berhasil diubah');
    }
    public function destroy(string $id)
    {
        $check  = User::find($id);
        if (!$check) {
            return redirect('/user')->with('error', 'Data user tidak ditemukan');
        }
        try {
            User::destroy($id);
            return redirect('/user')->with('success', 'Data user berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/user')->with('error', 'Data user gagal dihapus karena masih terdapat di tabel lain ');
        }
    }
}
