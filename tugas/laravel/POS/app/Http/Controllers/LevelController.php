<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    public function index()
    {
        // DB::insert('insert into m_level ( level_kode, level_nama, created_at) values (?, ?, ?)', ['LVL004', 'Customer', now()]);
        // return 'berhasil di tambahkan';
    }

    public function update()
    {
        DB::update('update m_level set level_kode = ? where level_id = ?', ['TOM', 4]);
        return 'berhasil di update';
    }
    public function display()
    {
        $data = DB::select("select * from m_level");
        // items itu variabel untuk $data ngambil dari sini
        return view('level', ['items' => $data]);
    }

    public function delete()
    {
        DB::delete('delete from m_level where level_id = ?', [4]);
        return 'berhasil di delete';
    }
}
