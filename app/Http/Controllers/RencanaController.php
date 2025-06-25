<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rencana;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\RencanaCreateRequest;
use App\Http\Requests\RencanaUpdateRequest;

class RencanaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rencanas = Rencana::latest()->paginate(5);

        return view('folder_rencana.rencana', [

            'rencanas' => $rencanas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('folder_rencana.create');
    }

    public function store(RencanaCreateRequest $request)
    {
        
        $data = $request->validated();


        $data['user_id'] = Auth::id();
       
        $rencana = Rencana::create($data);

        $rencana->addMediaFromRequest('image')
            ->toMediaCollection('default', 'public');


        return redirect()->route('folder_rencana.rencana');
    }

    /**
     * Display the specified resource.
     */
    public function show( string $username, Rencana $rencana)
    {
        return view('folder_rencana.show', [
            'rencana' => $rencana,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rencana $rencana)
    {
        if($rencana->user_id !== Auth::id()){
            abort(403);
        }
        return view('folder_rencana.edit', [
            'rencana' => $rencana,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RencanaUpdateRequest $request, Rencana $rencana)
    {
        if($rencana->user_id !== Auth::id()){
            abort(403);
        }

        $data = $request->validated();

        $rencana->update($data);

        if($data['image'] ?? false){
            $rencana->addMediaFromRequest('image')
                ->toMediaCollection('default', 'public');
        }

        return redirect()->route('folder_rencana.rencana');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rencana $rencana)
    {
        if($rencana->user_id !== Auth::id()){
            abort(403);
        }

        $rencana->delete();

        return redirect()->route('folder_rencana.rencana');
    }

}
