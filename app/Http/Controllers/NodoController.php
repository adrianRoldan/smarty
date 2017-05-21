<?php

namespace App\Http\Controllers;

use App\Nodo;
use Illuminate\Http\Request;

class NodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get(Request $request){

        logger($request->dispositivo);
        return Nodo::find($request->id);
    }
}
