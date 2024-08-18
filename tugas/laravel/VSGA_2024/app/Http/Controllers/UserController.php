<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index()
    {
        return view('profil', ['title' => 'Profil']);
    }

    public function getUsers()
    {
        $users = User::select(['id', 'name', 'email', 'created_at', 'updated_at']);
        return DataTables::of($users)->make(true);
    }
}
