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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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

        $grid->setNodo(4, 10, Nodo::find(1));        // Creamos los 12 nodos semáforo
        $grid->setNodo(5, 6, Nodo::find(2));
        $grid->setNodo(5, 11, Nodo::find(3));
        $grid->setNodo(5, 16, Nodo::find(4));
        $grid->setNodo(6, 5, Nodo::find(5));
        $grid->setNodo(6, 15, Nodo::find(6));
        $grid->setNodo(9, 10, Nodo::find(7));
        $grid->setNodo(10, 4, Nodo::find(8));
        $grid->setNodo(10, 9, Nodo::find(9));
        $grid->setNodo(10, 14, Nodo::find(10));
        $grid->setNodo(11, 5, Nodo::find(11));
        $grid->setNodo(11, 15, Nodo::find(12));

        return view("mapa", compact("grid"));       // mostramos la vista "mapa" del front-end
    }
}
