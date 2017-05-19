<?php
/**
 * Created by PhpStorm.
 * User: AR
 * Date: 18/05/2017
 * Time: 23:15
 */

namespace App\Components\Mapa;


class Box
{
    public $coordinates;
    public $type;
    public $directions;
    public $nodo;
    public $html;


    function __construct($lat, $long, $type){

        $this->coordinates = [$lat, $long];
        $this->type = $type;
        $this->nodo = null;
        $this->html = "<td class='$this->type'><br /></td>";
    }


    public function setNodo($nodo){

        $this->nodo = $nodo;
        $this->html = "<td title='(".$this->coordinates[0].",".$this->coordinates[1].")' class='nodo'>
                            <div style='background-color: green' id='".$nodo->client_mqtt_id."'></div>
                       </td>";
    }


    public function setHtml($type){

        $this->html = "<td title='(".$this->coordinates[0].",".$this->coordinates[1].")' class='$type'><br /></td>";
    }


    public function getType(){
        return $this->type;
    }


    public function getCoord(){
        return $this->coordinates;
    }


    public function getDir(){
        return $this->directions;
    }
}