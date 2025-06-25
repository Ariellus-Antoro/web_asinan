<?php

namespace App\Http\Controllers;

use App\Http\Requests\BeritaCreateRequest;
use App\Http\Requests\BeritaUpdateRequest;
use App\Models\Berita;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $beritas = Berita::latest()->paginate(5);

        return view('folder_berita.berita', [

            'beritas' => $beritas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('folder_berita.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BeritaCreateRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = Auth::id();
       
        $berita = Berita::create($data);

        $berita->addMediaFromRequest('image')
            ->toMediaCollection('default', 'public');


        return redirect()->route('berita');
    }

    /**
     * Display the specified resource.
     */
    public function show( string $username, Berita $berita)
    {
        return view('folder_berita.show', [
            'berita' => $berita,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $berita)
    {
        if($berita->user_id !== Auth::id()){
            abort(403);
        }
        $categories = Category::get();
        return view('folder_berita.edit', [
            'berita' => $berita,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BeritaUpdateRequest $request, Berita $berita)
    {
        if($berita->user_id !== Auth::id()){
            abort(403);
        }

        $data = $request->validated();

        $berita->update($data);

        if($data['image'] ?? false){
            $berita->addMediaFromRequest('image')
                ->toMediaCollection();
        }

        return redirect()->route('berita');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $berita)
    {
        if($berita->user_id !== Auth::id()){
            abort(403);
        }

        $berita->delete();

        return redirect()->route('berita');
    }

    public function category(Category $category)
    {
        $beritas = $category->berita()->latest()->simplePaginate(5);

        return view('folder_berita.berita', [
            'beritas' => $beritas,
        ]);
    }

}
