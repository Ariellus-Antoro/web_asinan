<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Berita;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class UserBeritaController extends Controller
{
    public function index()
    {
        
        $beritas = Berita::latest()->paginate(9);
        $categories = Category::all();
        $beritaTerbarus = Berita::latest()->take(3)->get();

        return view('folder_user.berita', [

            'beritas' => $beritas,
            'categories' => $categories,
            'beritaTerbarus' => $beritaTerbarus,
        ]);
    }

    public function show( string $username, Berita $berita)
    {
        $categories = Category::all();
        return view('folder_user.showBerita', [
            'berita' => $berita,
            'categories' => $categories,
        ]);
    }

    public function category(Category $category)
    {
        $beritas = $category->berita()->latest()->simplePaginate(9);
        $beritaTerbarus = Berita::latest()->take(3)->get();
        $categories = Category::all();

        return view('folder_user.berita', [
            'beritas' => $beritas,
            'categories' => $categories,
            'category' => $category,
            'beritaTerbarus' => $beritaTerbarus,
        ]);
    }
}
