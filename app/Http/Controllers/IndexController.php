<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Wisata;
use App\Models\Paket_wisata;

class IndexController extends Controller
{


    public function index()
    {
        $wisatas = Wisata::all();
        $top_2_wisatas = Wisata::latest()->take(2)->get();
        $top_2_pakets = Paket_wisata::latest()->take(2)->get();
        $top_4_beritas = Berita::latest()->take(4)->get();
        return view('index',[
            'wisatas' => $wisatas,
            'top_2_wisatas' => $top_2_wisatas,
            'top_2_pakets' => $top_2_pakets,
            'top_4_beritas' => $top_4_beritas,
        ]);
    }

}
