<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalloController extends Controller
{
    public function hallo()
    {
        return "hello world";
    }
    public function greeting()
    {
        return view('blog.hellow')
            ->with('name', 'ando')
            ->with('pekerjaan', 'dosen');
    }
}
