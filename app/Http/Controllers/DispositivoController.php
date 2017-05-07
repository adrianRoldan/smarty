<?php

namespace App\Http\Controllers;

use App\Dispositivo;
use Illuminate\Http\Request;

class DispositivoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get(Request $request){
        logger($request->dispositivo);
        return Dispositivo::find($request->dispositivo);
    }
}
