<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\WisataCreateRequest;
use App\Http\Requests\WisataUpdateRequest;

class WisataController extends Controller
{

    public function index()
    {
        $wisatas = Wisata::latest()->paginate(10);

        return view('folder_wisata.wisata', [

            'wisatas' => $wisatas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('folder_wisata.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WisataCreateRequest $request)
    {
         
        $data = $request->validated();


        $data['user_id'] = Auth::id();
       
        $wisata = Wisata::create($data);

        $wisata->addMediaFromRequest('image')
            ->toMediaCollection('default', 'public');


        return redirect()->route('folder_wisata.wisata');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $username, Wisata $wisata)
    {
        return view('folder_wisata.show', [
            'wisata' => $wisata,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wisata $wisata)
    {
        if($wisata->user_id !== Auth::id()){
            abort(403);
        }
        return view('folder_wisata.edit', [
            'wisata' => $wisata,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WisataUpdateRequest $request, Wisata $wisata)
    {
        if($wisata->user_id !== Auth::id()){
            abort(403);
        }

        $data = $request->validated();

        $wisata->update($data);

        if($data['image'] ?? false){
            $wisata->addMediaFromRequest('image')
                ->toMediaCollection('default', 'public');
        }

        return redirect()->route('folder_wisata.wisata');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wisata $wisata)
    {
        if($wisata->user_id !== Auth::id()){
            abort(403);
        }

        $wisata->delete();

        return redirect()->route('folder_wisata.wisata');
    }
}
