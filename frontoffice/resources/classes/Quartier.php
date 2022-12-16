<?php
    class Quartier{
        private int $id;
        private string $nom;

        public function set_id(int $id){
            $this->id = $id;
        }
        public function get_id(){
            return $this->id;
        }

        public function set_nom(string $nom){
            $this->nom = $nom;
        }
        public function get_nom(){
            return $this->nom;
        }

        private function __construct(int $id, string $nom){
            $this->set_id($id);
            $this->set_nom($nom);
        }
        public static function getById(PDO $connection, int $id) : Quartier{
            $result = $connection->query(sprintf("SELECT * from quartier where idQuartier=%d", $id), PDO::FETCH_OBJ);
            if($result->rowCount() != 1){
                throw new Exception("There should be 1 object for this ID");
            }
            $data = $result->fetchObject();
            return new Quartier(
                $data->idquartier,
                $data->nom
            );
        }
        public static function getAll(PDO $connection) : array{
            $returns = [];
            $result = $connection->query(sprintf("SELECT * from quartier"), PDO::FETCH_OBJ);
            foreach ($result->fetchAll() as $key => $data) {
                $returns[] = new Quartier(
                    $data->idquartier,
                    $data->nom
                );
            }
            return $returns;
        }
    }
?>