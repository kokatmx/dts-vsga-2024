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
        // $breadcrumb = (object)['title' => 'Daftar User', 'list' => ['Home', 'User']];
        // $page = (object)['title' => 'Daftar User yang terdaftar dalam sistem'];
        // $activeMenu = 'user';
        // $level = Level::all();
        // $users = User::with('level')->get();
        return view('user.index');
    }
    public function getUsers()
    {
        $users = User::select(['user_id', 'username', 'nama', 'created_at', 'updated_at']);
        return DataTables::of($users)->make(true);
    }
    public function list(Request $request)
    {
        $users = User::select('user_id', 'username', 'nama', 'level_id')
            ->with('level');
        if ($request->level_id) {
            $users->where('level_id', $request->level_id);
        }

        return DataTables::of($users)
            ->addColumn('level_nama', function ($user) {
                return $user->level->level_nama;
            })
            ->addColumn('aksi', function ($user) {
                $btn  = '<a href="' . url('/user/' . $user->user_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/user/' . $user->user_id . '/edit') . '"class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' .
                    url('/user/' . $user->user_id) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
    public function create()
    {
        $breadcrumb = (object)['title' => 'Tambah User', 'list' => ['Home', 'User', 'Tambah']];
        $page = (object)['title' => 'Tambah User Baru'];
        $level = Level::all()->map(function ($item) {
            return (object)['level_id' => $item->level_id, 'level_nama' => $item->level_nama];
        });
        $activeMenu = 'user';
        return view('user.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|min:3|unique:users,username',
            'nama' => 'required|string|max:100',
            'password' => 'required|min:5',
            'level_id' => 'required|integer',
        ]);
        User::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => bcrypt($request->password),
            'level_id' => $request->level_id,
        ]);
        return redirect('user')->with('success', 'User berhasil ditambahkan');
    }
    public function show(string $id)
    {
        $user = User::with('level')->find($id);
        $breadcrumb = (object)[
            'title' => 'Detail User',
            'list' => ['Home', 'User', 'Detail']
        ];
        $page = (object)[
            'title' => 'Detail User',
        ];
        $activeMenu = 'user';
        return view('user.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu]);
    }
    // Menampilkan halaman form edit user
    public function edit(string $id)
    {
        $user = User::find($id);
        $level = Level::all();

        $breadcrumb = (object) [
            'title' => 'Edit User',
            'list' => ['Home', 'User', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit user'
        ];

        $activeMenu = 'user'; // set menu yang sedang aktif

        return view('user.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'user' => $user,
            'level' => $level,
            'activeMenu' => $activeMenu
        ]);
    }

    // Menyimpan perubahan data user
    public function update(Request $request, string $id)
    {
        $request->validate([
            'username' => 'required|string|min:3|unique:users,username,' . $id . ',user_id',
            'nama' => 'required|string|max:100',
            'password' => 'nullable|min:5',
            'level_id' => 'required|integer'
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
        $check = User::find($id);
        if (!$check) {
            return redirect('/user')->with('error', 'User tidak ditemukan');
        }
        try {
            User::destroy($id);
            return redirect('user')->with('success', 'User berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('user')->with('error', 'User gagal dihapus karena masih terdapat tabel lain yang berkaitan dengan data ini');
        }
    }
}
