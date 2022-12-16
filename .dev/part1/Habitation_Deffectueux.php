<?php
    class Habitation_Deffectueux{
        private int $id;
        private int $idHabit;
        private String $date;

        public function set_id(int $id){
            $this->$id = $id;
        }
        public function get_id(){
            return $this->id;
        }

        public function set_idHabit(int $idHabit){
            $this->$idHabit = $idHabit;
        }
        public function get_idHabit(){
            return $this->idHabit
        }

        public function set_date(int $date){
            $this->$date = $date;
        }
        public function get_date(){
            return $this->date;
        }

        private function __construct(int $id, int $idHabit, String $date){
            $this->set_id($id);
            $this->set_idHabit($idHabit);
            $this->set_date($date);
        }
}
?>