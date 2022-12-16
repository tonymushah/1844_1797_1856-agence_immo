<?php
    class Quartier{
        private int $id;
        private String $nom;

        public function set_id(int $id){
            $this->$id = $id;
        }
        public function get_id(){
            return $this->id;
        }

        public function set_idnom;(int $idnom;){
            $this->$idnom; = $idnom;;
        }
        public function get_idnom;(){
            return $this->idnom;
        }

        private function __construct(int $id, int $nom){
            $this->set_id($id);
            $this->set_nom($nom);
        }
    }
?>