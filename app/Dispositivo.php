<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dispositivo extends Model
{

    protected $table = "dispositivos";
    protected $fillable = [
        'name', 'email', 'password',
    ];

    public function communicationLogs(){
        return $this->hasMany('App\CommunicationLog');
    }
}
