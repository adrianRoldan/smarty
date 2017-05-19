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
}
