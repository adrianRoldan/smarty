<?php

/*namespace App;*/

class Box {
    public $coordinates; /*latitude, longitude*/
    public $type; /*building, street, park, hospital, semphore*/
    public $directions; /*direcciones = [ "north" => 4, "south" => 1, "east" => 0, "west" => 2];*/ /*0 indica que no hay más mapa o bien sentido contrario*/
    public $node;
    public $sense;
   
   
    function Box($lat, $long, $type) { /*qué pasa con las direcciones, lo hacemos luego? aquí?  ?????*/
        $this->coordinates = [$lat, $long];
        $this->type = $type;
        $this->node = null;
        /*read_directions potser millor llegirles al grid*/
    }

    function change_Type($type){
        $this->type = $type;
    }
    
    function get_Type(){
        $this->type;
    }
    
    function getCoord(){
        $this->coordinates;
    }
    
    function getDir(){
        $this->directions;
    }
    
    function getSense(){
        $this->sense;
    }
    
    private function setNode(){
        
    }
    
    /*private function read_directions(){
        $fp = fopen("/opt/lampp/htdocs/directions.txt", "r");
        while (!feof($fp)){
             $line = fgets($fp);
             //if ($line == coordinates)
        }
        fclose($fp);
    }*/
    
    
} 

/*class Semaphore extends Box {
    public $state; //red, green

    function change_state(){
        
    }
    
}*/

?> 