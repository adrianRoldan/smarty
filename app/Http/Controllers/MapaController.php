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

        $grid = new Grid(18, 24);
        $grid->horizontalLineFrom(0, "street");     // Formatamos las calles horizontales
        $grid->horizontalLineFrom(5, "street");
        $grid->horizontalLineFrom(6, "street");
        $grid->horizontalLineFrom(11, "street");
        $grid->horizontalLineFrom(12, "street");
        $grid->horizontalLineFrom(17, "street");


        $grid->verticalLineFrom(0, "street");       // Formatamos las calles verticales
        $grid->verticalLineFrom(5, "street");
        $grid->verticalLineFrom(6, "street");
        $grid->verticalLineFrom(11, "street");
        $grid->verticalLineFrom(12, "street");
        $grid->verticalLineFrom(17, "street");
        $grid->verticalLineFrom(18, "street");
        $grid->verticalLineFrom(23, "street");

        $grid->setBox(5, 0, "hospital");
        $grid->setBox(9, 22, "accidente");

        $grid->setNodo(5, 6, Nodo::find(1));        // Creamos tres nodos semáforo
        $grid->setNodo(5, 12, Nodo::find(2));
        $grid->setNodo(5, 18, Nodo::find(3));
        return view("mapa", compact("grid"));       // mostramos la vista "mapa" del front-end
    }
}
