<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommunicationLog extends Model
{
    protected $table = "communicationlogs";
    protected $fillable = [
        'dispositivo_id', 'mensaje', 'fechaEnvio',
    ];

    public function dispositivo(){
        return $this->belongsTo('App\Dispositivo');
    }
}
