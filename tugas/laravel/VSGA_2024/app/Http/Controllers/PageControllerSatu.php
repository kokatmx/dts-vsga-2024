<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageControllerSatu extends Controller
{
    public function index()
    {
        return 'welcome broh!';
    }
    public function satu()
    {
        $arrBuah = ['apel', 'mangga', 'pisang'];
        return view('pasarBuah')->with('pasarBuah', $arrBuah);
    }
}
