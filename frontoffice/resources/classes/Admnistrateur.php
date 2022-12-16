<?php
    class Admnistateur{
        private int $id;
        private string $pseudo;
        private string $mdp;
        public function set_id(int $id){
            $this->id = $id;
        }
        public function get_id(): int{
            return $this->id;
        }
        public function set_pseudo(string $pseudo){
            $this->pseudo = $pseudo;
        }
        public function get_pseudo(): string{
            return $this->pseudo;
        }
        public function set_mdp(string $mdp){
            $this->mdp = $mdp;
        }
        public function get_mdp(): string{
            return $this->mdp;
        }
        private function __construct(int $id, string $pseudo, string $mdp){
            $this->set_id($id);
            $this->set_mdp($mdp);
            $this->set_pseudo($pseudo);
        }
        public static function getByID(PDO $connection , int $id) : Admnistateur{
            $result = $connection->query(sprintf("select * from administrateur where idadministrateur=%d", $id), PDO::FETCH_OBJ);
            if ($result->rowCount() != 1) {
                throw new Exception("Can't find the admnistrator ".$id);
            }
            $data = $result->fetchObject();
            return new Admnistateur($data->idadministrateur, $data->pseudo, $data->mdp);
        }
        public static function getAllAdmin(PDO $connection) : array {
            $returns = [];
            $result = $connection->query(sprintf("select * from administrateur"), PDO::FETCH_OBJ);
            foreach ($result->fetchAll() as $key => $data) {
                $returns[] = new Admnistateur($data->idadministrateur, $data->pseudo, $data->mdp);
            }
            return $returns;
        }
        public static function login(PDO $connection, string $pseudo, string $password) : Admnistateur{
            $result = $connection->query(sprintf("select * from administrateur where pseudo='%s' and mdp='%s'", $pseudo, $password), PDO::FETCH_OBJ);
            if ($result->rowCount() != 1) {
                throw new Login_Error();
            }
            $data = $result->fetchObject();
            return new Admnistateur($data->idadministrateur, $data->pseudo, $data->mdp);
        }
        public static function inscription(PDO $connection, string $pseudo, string $password) : Admnistateur{
            $getted = $connection->exec(sprintf("insert into administrateur values(nextval('seqAdmin'), '%s', '%s')", $pseudo, $password));
            return Admnistateur::login($connection, $pseudo, $password);
        }
    }
?>