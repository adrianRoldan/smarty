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
    public $coordinates;	/* es la posición de la casilla en el mapa [latitud, longitud]  */
    public $type;		/* esto indica qué tipo de elemento es la casilla: building, street, park, hospital, semaphore */
    public $directions;		/* tiempo a la siguiente casilla hacia el [norte, sur, este, oeste]; donde -1 indica No-circulable/fuera delmap/sentido incorrecto */
    public $sense;		/* sentido de circulación de la calle o null si no es una zona circulable */
    public $nodo;		/* dispositivo/elemento de la ciudad */
    public $html;		/* contenido/formato que mostrará la casilla en el front */


    /* Constructora */ 
    function __construct($lat, $long, $type){

        $this->coordinates = [$lat, $long];
        $this->type = $type;
        $this->nodo = null;
        $this->html = "<td title='(".$this->coordinates[0].",".$this->coordinates[1].")' 
                           id='".$this->coordinates[0]."_".$this->coordinates[1]."'
                           class='$this->type box'><br /></td>";
    }

    /* Especificar el dispositivo y sus propiedades html */
    public function setNodo($nodo){

        $this->nodo = $nodo;
        $this->html = "<td title='(".$this->coordinates[0].",".$this->coordinates[1].")' 
                            id='".$this->coordinates[0]."_".$this->coordinates[1]."'>".
                            $nodo->html()
                       ."</td>";
    }

    /* Añadimos tipo de celda (edificion, calle, parque...) */
    public function setHtml($type){

        $this->html = "<td title='(".$this->coordinates[0].",".$this->coordinates[1].")' 
                            id='".$this->coordinates[0]."_".$this->coordinates[1]."'
                            class='$type box'><br /></td>";
    }

    /* Especificar el sentido de circulación */
    public function setSense($sense){
	$this->sense = $sense;
    }

    /* Consultar el sentido de circulación */
    public function getSense(){
    	return $this->sense;
    }

    /* Especificar el tipo de casilla */
    public function setType($type){
        $this->type = $type;
    }

    /* Consultar el tipo de casilla */
    public function getType(){
        return $this->type;
    }

    /* Consultar las coordenadas */
    public function getCoord(){
        return $this->coordinates;
    }

    /* Especificar las distancias a las 4 casillas vecinas */
    public function setDir($directions){
        $this->directions = $directions;
    }
    
    /* Consultar las distancias a las 4 casillas vecinas */
    public function getDir(){
        return $this->directions;
    }

}
