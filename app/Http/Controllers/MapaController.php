<?php

namespace App\Http\Controllers;

use App\Components\Mapa\Grid;
use App\Nodo;
use Illuminate\Http\Request;

class MapaController extends Controller     // MapaController es una subclase de Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        /*$nodo = Nodo::find(1);
        dd($nodo->html());*/

        $grid = new Grid(16, 21);
        $grid->horizontalLineFrom(0, "street");     // Formatamos las calles horizontales
        $grid->horizontalLineFrom(5, "street");
        $grid->horizontalLineFrom(10, "street");
        $grid->horizontalLineFrom(15, "street");

        $grid->verticalLineFrom(0, "street");       // Formatamos las calles verticales
        $grid->verticalLineFrom(5, "street");
        $grid->verticalLineFrom(10, "street");
        $grid->verticalLineFrom(15, "street");
        $grid->verticalLineFrom(20, "street");

        $grid->setNodo(5, 5, Nodo::find(1));        // Creamos tres nodos semáforo
        $grid->setNodo(10, 5, Nodo::find(2));
        $grid->setNodo(15, 10, Nodo::find(3));
        return view("mapa", compact("grid"));       // mostramos la vista "mapa" del front-end
    }
}
