<?php
    class TypeHabitation{
        private int $id;
        private String $nom;

        public function set_id(int $id){
            $this->$id = $id;
        }
        public function get_id(){
            return $this->id;
        }

        public function set_nom(int $nom){
            $this->nom = $nom;
        }
        public function get_nom(){
            return $this->nom;
        }

        private function __construct(int $id, int $nom){
            $this->set_id($id);
            $this->set_nom($nom);
        }
        public static function getById(PDO $connection, int $id) : TypeHabitation{
            $result = $connection->query(sprintf("SELECT * from typehabitation where idType=%d", $id), PDO::FETCH_OBJ);
            if($result->rowCount() != 1){
                throw new Exception("There should be 1 object for this ID");
            }
            $data = $result->fetchObject();
            return new TypeHabitation(
                $data->idtype,
                $data->nom
            );
        }
        public static function getAll(PDO $connection) : array{
            $returns = [];
            $result = $connection->query(sprintf("SELECT * from typehabitation"), PDO::FETCH_OBJ);
            foreach ($result->fetchAll() as $key => $data) {
                $returns[] = new TypeHabitation(
                    $data->idtype,
                    $data->nom
                );
            }
            return $returns;
        }
    }
?>