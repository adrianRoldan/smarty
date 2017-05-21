<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nodo extends Model
{

    // Tabla de la base de datos al acual pertenece el modelo
    protected $table = "nodos";

    // Atributos con oscuales se puede crear un objeto nodo
    protected $fillable = [
        'nombre', 'client_mqtt_id', 'tipo', 'ip', 'activo'
    ];


    public function html(){
        return "<div data-id='".$this->id."' class='nodo'><div style='background-color: green' id='".$this->client_mqtt_id."'>
        </div></div>";
    }
}
