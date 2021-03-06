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

        $grid->setBox(5, 0, "hospital");
        $grid->setBox(1, 15, "accidente");

        //Creamos los semaforos en el mapa
        $semaforos = Nodo::where('tipo', 'semaforo')->get();
        foreach($semaforos as $semaforo){
            $grid->setNodo($semaforo->ubicacion_x, $semaforo->ubicacion_y, $semaforo);
        }

        return view("mapa", compact("grid"));       // mostramos la vista "mapa" del front-end
    }
}
