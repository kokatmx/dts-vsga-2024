<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengajarController extends Controller
{
    public function daftarPengajar()
    {
        return "Form Daftar Pengajar Mahasiswa";
    }

    public function tabelPengajar()
    {
        return "Tabel Pengajar Mahasiswa";
    }

    public function blogPengajar()
    {
        return "Halaman Blog Pengajar";
    }
}
