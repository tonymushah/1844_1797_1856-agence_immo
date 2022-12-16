<?php
    class Photo_Habitation{
        private int $id;
        private int $idHabitation;
        private String $lien;

        public function set_id(int $id){
            $this->$id = $id;
        }
        public function get_id(){
            return $this->id;
        }

        public function set_idHabitation(int $idHabitation){
            $this->$idHabitation = $idHabitation;
        }
        public function get_idHabitation(){
            return $this->idHabitation;
        }

        public function set_lien(int $lien){
            $this->$lien = $lien;
        }
        public function get_lien(){
            return $this->lien;
        }

        
        private function __construct(int $id, int $idHabitation, String $lien){
            $this->set_id($id);
            $this->set_idHabitation($idHabitation);
            $this->set_lien($lien);
        }
    }
?>