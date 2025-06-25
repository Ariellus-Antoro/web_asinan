<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket_wisata;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserPaket_wisataController extends Controller
{
    public function index()
    {
        
        $paket_wisatas = Paket_wisata::latest()->paginate(5);

        return view('folder_user.paket_wisata', [

            'paket_wisatas' => $paket_wisatas,
        ]);
    }

    public function show(string $username, Paket_wisata $paket_wisata)
    {
        return view('folder_user.showPaket_wisata', [
            'paket_wisata' => $paket_wisata,
        ]);
    }
}
