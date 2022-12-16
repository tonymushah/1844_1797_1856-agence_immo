<?php
    class Reservation{
        private int $idReservation;
        private int $idHabitation;
        private int $idClient;
        private String $date;
        private String $fin;


        public function set_idReservation(int $idReservation){
            $this->$idReservation = $idReservation;
        }
        public function get_idReservation(){
            return $this->idReservation;
        }

        public function set_idHabitation(int $idHabitation){
            $this->$idHabitation = $idHabitation;
        }
        public function get_idHabitation(){
            return $this->idHabiattion;
        }

        public function set_idClient(int $idClient){
            $this->$idClient = $idClient;
        }
        public function get_idClient(){
            return $this->idClient;
        }

        public function set_Date(int $Date){
            $this->$Date = $Date;
        }
        public function get_Date(){
            return $this->Date;
        }

        public function set_Fin(int $Fin){
            $this->$Fin = $Fin;
        }
        public function get_idFin(){
            return $this->Fin;
        }
        private function __construct(int $idReservation, int $idHabitation, int $idClient, String $date, String $fin){
            $this->set_idReservation($idReservation);
            $this->set_idHabitation($idHabitation);
            $this->set_idClient($idClient);
            $this->set_date($date);
            $this->set_fin($fin);
        }
    }
?>