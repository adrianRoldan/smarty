<?php

namespace App\Http\Controllers;

use App\Components\Mapa\Grid;
use App\Nodo;
use Illuminate\Http\Request;

class MapaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $grid = new Grid(16, 21);
        $grid->horizontalLineFrom(0, "street");
        $grid->horizontalLineFrom(5, "street");
        $grid->horizontalLineFrom(10, "street");
        $grid->horizontalLineFrom(15, "street");

        $grid->verticalLineFrom(0, "street");
        $grid->verticalLineFrom(5, "street");
        $grid->verticalLineFrom(10, "street");
        $grid->verticalLineFrom(15, "street");
        $grid->verticalLineFrom(20, "street");

        $grid->setNodo(5, 5, Nodo::find(1));
        $grid->setNodo(10, 5, Nodo::find(1));
        return view("mapa", compact("grid"));
    }
}