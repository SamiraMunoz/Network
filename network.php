<?php
  include('vertex.php');

  class Network{
    private $matrix;
    private $array;
    private $directed;

    public function __construct($directed = true) {
      $this -> matrix = null;
      $this -> array = null;
      $this -> directed = $directed;
    }

    public function getVertex($vertex) {
      return $this -> array[$vertex];
    }

    public function getArray(){
      return $this -> array;
    }

    public function getMatrix(){
      return $this -> matrix;
    }

    public function getAdjacent($array){
      return $this->matrix[$array];
    }

    public function addVertex($vertex) {
      if (!isset($this -> array[$vertex -> getId()])) {
        $this -> matrix[$vertex -> getId()] = null;
        $this -> array[$vertex -> getId()] = $vertex;
      }else{
        return false;
      }

      return true;
    }

    public function addEdge($from, $to, $weight = null) {
      if (isset($this -> array[$from]) && isset($this -> array[$to])){
        $this -> matrix[$from][$to] = $weight;
      }else{
        return false;
      }

      return true;
    }

    public function degreesEntry($array){
      return count($this -> matrix[$array]);
    }

    public function degreesExit($arrayFind){
      $degrees = 0;
      if($this -> matrix != null){
        foreach ($this -> matrix as $indexMatrix => $array) {
          if($array != null){
            foreach ($array as $indexArray => $weight) {
              if($indexArray == $arrayFind){
                $degrees++;
              }
            }
          }
        }
      }
      return $degrees;
    }

    public function degrees($array){
      return $this -> degreesEntry($array) + $this -> degreesExit($array);
    }

    public function deleteEdge($from, $to){
      if(isset($this -> matrix[$from][$to])){
        unset($this -> matrix[$from][$to]);
      }else{
        return false;
      }

      return true;
    }

    public function deleteVertex($arrayFind){
      if(isset($this -> array[$arrayFind])){
        foreach ($this -> matrix as $indexMatrix => $array) {
          if($array != null){
            foreach ($array as $indexArray => $weight) {
              if($indexArray == $arrayFind){
                unset($this -> matrix[$indexMatrix][$indexArray]);
              }
            }
          }
        }
        unset($this -> matrix[$arrayFind]);
        unset($this -> array[$arrayFind]);
      }else{
        return false;
      }

      return true;
    }
  }
?>
