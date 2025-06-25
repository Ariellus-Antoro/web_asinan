<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rencana;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserRencanaController extends Controller
{
    public function index()
    {
        $rencanas = Rencana::latest()->paginate(5);

        return view('folder_user.rencana', [

            'rencanas' => $rencanas,
        ]);
    }

    public function show(string $username, Rencana $rencana)
    {
        return view('folder_user.showRencana', [
            'rencana' => $rencana,
        ]);
    }
}
