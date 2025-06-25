<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket_wisata;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\Paket_wisataCreateRequest;
use App\Http\Requests\Paket_wisataUpdateRequest;

class Paket_wisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paket_wisatas = Paket_wisata::latest()->paginate(5);

        return view('folder_paketWisata.paket_wisata', [

            'paket_wisatas' => $paket_wisatas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('folder_paketWisata.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Paket_wisataCreateRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = Auth::id();
       
        $paket_wisata = Paket_wisata::create($data);

        $paket_wisata->addMediaFromRequest('image')
            ->toMediaCollection('default', 'public');


        return redirect()->route('folder_paketWisata.paket_wisata');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $username, Paket_wisata $paket_wisata)
    {
        return view('folder_paketWisata.show', [
            'paket_wisata' => $paket_wisata,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paket_wisata $paket_wisata)
    {
        if($paket_wisata->user_id !== Auth::id()){
            abort(403);
        }
        return view('folder_paketWisata.edit', [
            'paket_wisata' => $paket_wisata,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Paket_wisataUpdateRequest $request, Paket_wisata $paket_wisata)
    {
        if($paket_wisata->user_id !== Auth::id()){
            abort(403);
        }

        $data = $request->validated();

        $paket_wisata->update($data);

        if($data['image'] ?? false){
            $paket_wisata->addMediaFromRequest('image')
                ->toMediaCollection('default', 'public');
        }

        return redirect()->route('folder_paketWisata.paket_wisata');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paket_wisata $paket_wisata)
    {
        if($paket_wisata->user_id !== Auth::id()){
            abort(403);
        }

        $paket_wisata->delete();

        return redirect()->route('folder_paketWisata.paket_wisata');
    }
}
