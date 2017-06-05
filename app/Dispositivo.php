<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dispositivo extends Model
{

    protected $table = "dispositivos";
    protected $fillable = [
        'ip', 'mac', 'puerto', 'nombre'
    ];

    public function communicationLogs()
    {
        return $this->morphMany('App\CommunicationLog', 'logueable');
    }
}
