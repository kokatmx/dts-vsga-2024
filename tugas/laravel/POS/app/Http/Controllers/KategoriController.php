<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function store()
    {
        DB::table('m_kategori')->insert(['kategori_kode' => 'KTG006', 'kategori_nama' => 'Smartphone']);
        return 'berhasil di tambahkan';
    }
    public function update()
    {
        DB::table('m_kategori')->where('kategori_kode', 'KTG006')->update(['kategori_nama' => 'Database']);
        return 'berhasil di update';
    }

    public function delete()
    {
        DB::table('m_kategori')->where('kategori_kode', 'KTG006')->delete();
        return 'berhasil di delete';
    }
}
