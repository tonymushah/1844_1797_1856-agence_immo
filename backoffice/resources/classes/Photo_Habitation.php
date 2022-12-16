<?php
    class Photo_Habitation{
        private int $id;
        private int $idHabitation;
        private string $lien;

        public function set_id(int $id){
            $this->id = $id;
        }
        public function get_id(){
            return $this->id;
        }

        public function set_idHabitation(int $idHabitation){
            $this->idHabitation = $idHabitation;
        }
        public function get_idHabitation(){
            return $this->idHabitation;
        }

        public function set_lien(string $lien){
            $this->lien = $lien;
        }
        public function get_lien(){
            return $this->lien;
        }

        private function __construct(int $id, int $idHabitation, string $lien){
            $this->set_id($id);
            $this->set_idHabitation($idHabitation);
            $this->set_lien($lien);
        }
        
        public static function getById(PDO $connection, int $id) : Photo_Habitation{
            $result = $connection->query(sprintf("SELECT * from photoHabitation where idPhoto=%d", $id), PDO::FETCH_OBJ);
            if($result->rowCount() != 1){
                throw new Exception("There should be 1 object for this ID");
            }
            $data = $result->fetchObject();
            return new Photo_Habitation(
                $data->idphoto,
                $data->idhabitation,
                $data->lien
            );
        }
        public static function getAll(PDO $connection) : array{
            $returns = [];
            $result = $connection->query(sprintf("SELECT * from photoHabitation"), PDO::FETCH_OBJ);
            foreach ($result->fetchAll() as $key => $data) {
                $returns[] = new Photo_Habitation(
                    $data->idphoto,
                    $data->idhabitation,
                    $data->lien
                );
            }
            return $returns;
        }
        public static function getByHabitationID(PDO $connection, string $habitation_id) : array{
            $returns = [];
            $result = $connection->query(sprintf("SELECT * from photoHabitation where idHabitation=%d", $habitation_id), PDO::FETCH_OBJ);
            foreach ($result->fetchAll() as $key => $data) {
                $returns[] = new Photo_Habitation(
                    $data->idphoto,
                    $data->idhabitation,
                    $data->lien
                );
            }
            return $returns;
        }
        public static function create(PDO $connection, int $habitation, string $lien) : Photo_Habitation
        {
            $connection->beginTransaction();
            try{
                $connection->exec(sprintf("insert into photoHabitation values(nextVal('seqPhoto'), %d, '%s')", $habitation, $lien));
                $result = $connection->query(sprintf("SELECT * from photoHabitation where idHabitation=%d order by idPhoto desc limit(1)", $habitation), PDO::FETCH_OBJ);
                if($result->rowCount() != 1){
                    throw new Exception("There should be 1 object for this ID");
                }
                $data = $result->fetchObject();
                $connection->commit();
                return new Photo_Habitation(
                    $data->idphoto,
                    $data->idhabitation,
                    $data->lien
                );
            }catch(\Throwable $thr){
                $connection->rollBack();
                throw $thr;
            }
            
        }
    }
?>