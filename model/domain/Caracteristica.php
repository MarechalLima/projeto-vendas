<?php
    Class Caracteristica{
      private $id;
      private $titulo;

      public function __construct($id, $titulo) {
        $this->id = $id;
        $this->titulo = $titulo;
      }

      public function getId() {
        return $this->id;
      }

      public function getTitulo(){
        return $this->titulo;
      }

      public function setId($id) {
        $this->id = $id;
      }

      public function setTitulo($titulo) {
        $this->titulo = $titulo;
      }
    }
?>
