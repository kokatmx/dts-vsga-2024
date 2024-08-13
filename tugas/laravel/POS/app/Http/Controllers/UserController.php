<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;

class UserController extends Controller
{
    public function index()
    {
        $data = UserModel::with('level')->get();
        return view('user', ['data' => $data]);
    }
    public function store()
    {
        $data = ['username' => 'suko', 'nama' => 'sukodwia', 'password' => bcrypt('12345'), 'level_id' => 1];
        UserModel::create($data);
        $data = UserModel::all();
        return view('user', ['data' => $data]);
    }
    public function update()
    {
        $data = ['nama' => 'dwiatmodjo'];
        UserModel::where('username', 'suko')->update($data);
        $data = UserModel::all();
        return view('user', ['data' => $data]);
    }
    public function delete()
    {
        UserModel::where('username', 'suko')->delete();
        $data = UserModel::all();
        return view('user', ['data' => $data]);
    }
}
