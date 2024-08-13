<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AnggotaController extends Controller
{
    public function cekObject()
    {
        $anggota  = new Anggota();
        dump($anggota);
    }
    public function insert()
    {
        $anggota = new Anggota();
        $anggota->nip = '23298334';
        $anggota->nama = 'dwiat';
        $anggota->tanggal_lahir = '2000-01-01';
        $anggota->nilai = '3.58';
        $anggota->save();
        echo "Berhasil di tambahkan";
    }
    public function update()
    {
        $anggota = Anggota::find(1);
        $anggota->nama = 'dwiatomojiyo';
        $anggota->nilai = '3.52';
        $anggota->save();
        echo "Berhasil di update";
    }
    public function delete()
    {
        $anggota = Anggota::find(1);
        $anggota->delete();
        echo "Berhasil menghapus data";
    }
    public function all()
    {
        $result = Anggota::all();
        return view('anggota', ['data' => $result]);
    }
    public function find()
    {
        try {
            $result = Anggota::findOrFail(2); // Use findOrFail for convenience
            return view('anggota', ['data' => $result]);
        } catch (ModelNotFoundException $e) {
            // Handle the case where the record is not found
            return response()->json(['message' => 'Anggota not found'], 404);
        }
    }
    public function getWhere()
    {
        $result = Anggota::where('nilai', '>', '3.3')
            ->orderBy('nama', 'desc')
            ->get();
        return view('anggota', ['data' => $result]);
    }
}
