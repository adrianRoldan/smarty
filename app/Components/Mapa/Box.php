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
        $this->html = "<td title='(".$this->coordinates[0].",".$this->coordinates[1].")' 
                           id='".$this->coordinates[0]."_".$this->coordinates[1]."'
                           class='$this->type'><br /></td>";
    }


    public function setNodo($nodo){

        $this->nodo = $nodo;
        $this->html = "<td title='(".$this->coordinates[0].",".$this->coordinates[1].")' 
                            id='".$this->coordinates[0]."_".$this->coordinates[1]."'>".
                            $nodo->html()
                       ."</td>";
    }


    public function setHtml($type){

        $this->html = "<td title='(".$this->coordinates[0].",".$this->coordinates[1].")' 
                            id='".$this->coordinates[0]."_".$this->coordinates[1]."'
                            class='$type'><br /></td>";
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


    private function read_direction(){

        $fp = fopen("/opt/lampp/htdocs/directions.txt", "r");   //solo funciona para xampp (y tampoco windows) habra que jugar con los paths
        while(!feof($fp)){
            $line = fgets($fp);
        }
        fclose($fp);
    }
}