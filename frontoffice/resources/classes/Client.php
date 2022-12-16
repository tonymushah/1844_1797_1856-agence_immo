<?php
    class Client{
        private int $idClient;
        private string $pseudo;
        private string $nom;
        private string $password;
        private string $telephone;
        private string $mail;
        public function set_pseudo(string $pseudo){
            $this->pseudo = $pseudo;
        }
        public function get_pseudo(){
            return $this->pseudo;
        }
        public function set_id(int $idClient){
            $this->idClient = $idClient;
        }
        public function get_id(){
            return $this->idClient;
        }
        public function set_nom(string $nom){
            $this->nom = $nom;
        }
        public function get_nom(){
            return $this->nom;
        }
        public function set_password(string $password){
            $this->password = $password;
        }
        public function get_password(){
            return $this->password;
        }
        public function set_telephone(string $telephone){
            $this->telephone = $telephone;
        }
        public function get_telephone(){
            return $this->telephone;
        }
        public function set_mail(string $mail){
            $this->mail = $mail;
        }
        public function get_mail(){
            return $this->mail;
        }
        private function __construct(
            int $id, 
            string $pseudo, 
            string $nom,
            string $password,
            string $telephone,
            string $mail
        ){
            $this->set_id($id);
            $this->set_mail($mail);
            $this->set_nom($nom);
            $this->set_password($password);
            $this->set_pseudo($pseudo);
            $this->set_telephone($telephone);
        }
        public static function getClientById(PDO $connection, int $id): Client{
            $result = $connection->query(sprintf("select * from client where idClient=%d", $id), PDO::FETCH_OBJ);
            if($result->rowCount() > 1){
                throw new Exception("There is more than 1 who use this id");
            }elseif($result->rowCount() <= 0 ){
                throw new Exception("There is no client having this id");
            }
            $data = $result->fetchObject();
            return new Client($data->idclient, $data->pseudo, $data->nom, $data->mdp, $data->numtel, $data->mail);
        }
        public static function login(PDO $connection, string $pseudo, string $password): Client{
            $result = $connection->query(sprintf("select * from client where pseudo='%s' and mdp='%s'", $pseudo, $password), PDO::FETCH_OBJ);
            if($result->rowCount() != 1){
                throw new Login_Error();
            }
            $data = $result->fetchObject();
            return new Client($data->idclient, $data->pseudo, $data->nom, $data->mdp, $data->numtel, $data->mail);
        }
        public static function inscription(PDO $connection, string $nom, string $pseudo, string $password, string $telephone, string $mail): Client{
            $client = null;
            $connection->beginTransaction();
            try {
                $connection->exec(sprintf("INSERT INTO client VALUES(nextVal('seqClient'),'%s','%s','%s','%s','%s')", $pseudo, $nom, $password, $telephone, $mail)); 
                $client = Client::login($connection, $pseudo, $password);
                $connection->commit();
            } catch (\Throwable $th) {
                $connection->rollBack();
                throw $th;
            }
            return $client;
        }
    }
?>