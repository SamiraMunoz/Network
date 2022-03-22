<?php
  class Vertex{
    private $id;
    private $visited;

    public function __construct($id){
      $this -> id = $id;
      $this -> visited = false;
    }

    public function getId(){
      return $this -> id;
    }

    public function getVisited(){
      return $this -> visited;
    }

    public function setVisited($visited){
      $this -> visited = $visited;
    }

    public function setId($id){
      $this -> id = $id;
    }
  }
?>
