<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommunicationLog extends Model
{
    protected $table = "communicationlogs";
    protected $fillable = [
        'logueable_id', 'logueable_type', 'mensaje', 'topico', 'fechaEnvio',
    ];

    /*public function dispositivo(){
        return $this->belongsTo('App\Dispositivo');
    }*/

    public function logueable()
    {
        return $this->morphTo();
    }
}
