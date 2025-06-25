<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Wisata;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserWisataController extends Controller
{
    public function index()
    {
        $wisatas = Wisata::latest()->paginate(2);
        $top3s = Wisata::latest()->take(3)->get();
        $remainings = Wisata::whereNotIn('id', $top3s->pluck('id'))->latest()->get();

        return view('folder_user.wisata', [

            'wisatas' => $wisatas,
            'top3s' => $top3s,
            'remainings' => $remainings
        ]);
    }

    public function show(string $username, Wisata $wisata)
    {
        return view('folder_user.showWisata', [
            'wisata' => $wisata,
        ]);
    }
}
