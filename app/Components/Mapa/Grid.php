<?php

namespace App\Components\Mapa;

use App\Nodo;

class Grid
{
    public $rows;       /* número de filas del mapa */
    public $columns;    /* número de columnas del mapa */
    public $boxes;      /* vector de casillas contenidas en el mapa */

    /* Constructora */
    function __construct($rows, $columns){

        $this->rows = $rows;
        $this->columns = $columns;
        $this->boxes = array();         // Indicamos que boxes será un vector
        $this->initGrid();              // Generamos el grid, las casillas
    }

    /* Creación de las casillas del mapa */
    private function initGrid(){

        for($i = 0; $i < $this->rows; $i++){
            for($j = 0; $j < $this->columns; $j++){
                $this->boxes[$i][$j] = new Box($i, $j, "building");     // Crea nueva casilla de tipo edificio y la guarda en el vector
            }
        }
    }

    /* Especificación del formato de la casilla */
    public function setBox($row, $col, $type){

        $this->boxes[$row][$col]->setHtml($type);       // Aplicamos el formato html que le pertoca a la casilla
    }

    /* Especificación del elemento/dispositivo de la casilla */
    public function setNodo($row, $col, $nodo){

        $this->boxes[$row][$col]->setNodo($nodo);       // Asignamos las propiedades y estructuras segun el tipo de nodo que sea
    }

    /* Especificación del formato de las casillas de una fila completa */
    public function horizontalLineFrom($rowStart, $type){

        for($col = 0; $col < $this->columns; $col++)
            $this->boxes[$rowStart][$col]->setHtml($type);
    }

    /* Especificación del formato de las casillas de un fragmento de la fila */
    public function horizontalLineFromTo($rowStart, $colFinal, $type){

        for($col = 0; $col < $colFinal; $col++)
            $this->boxes[$rowStart][$col]->setHtml($type);
    }

    /* Especificación del formato de las casillas de una columna completa */
    public function verticalLineFrom($colStart, $type){

        for($row = 0; $row < $this->rows; $row++)
            $this->boxes[$row][$colStart]->setHtml($type);
    }

    /* Especificación del formato de las casillas de un fragmento de la columna */
    public function verticalLineFromTo($colStart, $rowFinal, $type){

        for($row = 0; $row < $rowFinal; $row++)
            $this->boxes[$row][$colStart]->setHtml($type);
    }
    
    /* Lectura del fichero que contiene las distancias a las casillas vecinas para todo el mapa */
    private function readDirections(){
        $fp = fopen("/opt/lampp/htdocs/directions.txt", "r");   // Abrimos el fichero de entrada (contemplar paths diferentes si se ejecuta en otro SO)
        for($i = 0; $i < $this->rows; $i++){
            for($j = 0; $j < $this->columns; $j++){
                $line = fgets($fp);                             // Vamos obteniendo sucesivamente las diferentes líneas
                $this->boxes[$i*$columns+$j]->setDir($line);    // Asignamos la línea (que contendrá los 4 valores de distancia a los vecinos)
             }                                                  //  al parámetro (directions) de cada casilla
        }
        fclose($fp);        // Cerramos el fichero
    }
    
}