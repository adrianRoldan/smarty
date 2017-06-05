<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nodo extends Model
{

    // Tabla de la base de datos a la cual pertenece el modelo
    protected $table = "nodos";

    // Atributos con los cuales se puede crear un objeto nodo
    protected $fillable = [
        'nombre', 'client_mqtt_id', 'tipo', 'ip', 'activo'
    ];


    public function communicationLogs()
    {
        return $this->morphMany('App\CommunicationLog', 'logueable');
    }


    public function html(){
        return "<div data-id='".$this->id."' class='nodo'><div style='background-color: green' id='".$this->client_mqtt_id."'>
        </div></div>";
    }
}
