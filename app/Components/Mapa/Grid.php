<?php

namespace App\Components\Mapa;

use App\Nodo;

class Grid
{
    public $rows;
    public $columns;
    public $boxes;

    function __construct($rows, $columns){

        $this->rows = $rows;
        $this->columns = $columns;
        $this->boxes = array();
        $this->initGrid();
    }


    private function initGrid(){

        for($i = 0; $i < $this->rows; $i++){
            for($j = 0; $j < $this->columns; $j++){
                $this->boxes[$i][$j] = new Box($i, $j, "building");
            }
        }
    }


    public function setBox($row, $col, $type){

        $this->boxes[$row][$col]->setHtml($type);
    }


    public function setNodo($row, $col, $nodo){

        $this->boxes[$row][$col]->setNodo($nodo);
    }


    public function horizontalLineFrom($rowStart, $type){

        for($col = 0; $col < $this->columns; $col++)
            $this->boxes[$rowStart][$col]->setHtml($type);
    }

    public function horizontalLineFromTo($rowStart, $colFinal, $type){

        for($col = 0; $col < $colFinal; $col++)
            $this->boxes[$rowStart][$col]->setHtml($type);
    }


    public function verticalLineFrom($colStart, $type){

        for($row = 0; $row < $this->rows; $row++)
            $this->boxes[$row][$colStart]->setHtml($type);
    }

    public function verticalLineFromTo($colStart, $rowFinal, $type){

        for($row = 0; $row < $rowFinal; $row++)
            $this->boxes[$row][$colStart]->setHtml($type);
    }
}