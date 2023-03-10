<?php
    class Reservation{
        private int $idReservation;
        private int $idHabitation;
        private int $idClient;
        private string $date;
        private string $fin;


        public function set_idReservation(int $idReservation){
            $this->idReservation = $idReservation;
        }
        public function get_idReservation(){
            return $this->idReservation;
        }

        public function set_idHabitation(int $idHabitation){
            $this->idHabitation = $idHabitation;
        }
        public function get_idHabitation(){
            return $this->idHabitation;
        }

        public function set_idClient(int $idClient){
            $this->idClient = $idClient;
        }
        public function get_idClient(){
            return $this->idClient;
        }

        public function set_Date(string $date){
            $this->date = $date;
        }
        public function get_Date(){
            return $this->date;
        }

        public function set_Fin(string $fin){
            $this->fin = $fin;
        }
        public function get_idFin(){
            return $this->fin;
        }
        private function __construct(int $idReservation, int $idHabitation, int $idClient, string $date, string $fin){
            $this->set_idReservation($idReservation);
            $this->set_idHabitation($idHabitation);
            $this->set_idClient($idClient);
            $this->set_date($date);
            $this->set_fin($fin);
        }
        public static function getById(PDO $connection, int $id) : Reservation{
            $result = $connection->query(sprintf("SELECT * from reservation where idReservation=%d", $id), PDO::FETCH_OBJ);
            if($result->rowCount() != 1){
                throw new Exception("There should be 1 object for this ID");
            }
            $data = $result->fetchObject();
            return new Reservation(
                $data->idreservation,
                $data->idhabitation,
                $data->idclient,
                $data->datedebut,
                $data->datefin
            );
        }
        public static function getAll(PDO $connection) : array{
            $returns = [];
            $result = $connection->query(sprintf("SELECT * from reservation"), PDO::FETCH_OBJ);
            foreach ($result->fetchAll() as $key => $data) {
                $returns[] = new Reservation(
                    $data->idreservation,
                    $data->idhabitation,
                    $data->idclient,
                    $data->datedebut,
                    $data->datefin
                );
            }
            return $returns;
        }
        public static function doReservation(PDO $connection,int $idHabitation,int $idClient,string $dateDebut,string $dateFin){
            $error="chambre occup?? pendant cette date";
            $succes="Reservation effectu?? avec succes";

            $sqlVerif=sprintf("select idHabitation from habitation where idHabitation=%d and idHabitation
            in (select idHabitation
            from habitationNonSupprime 
            where idHabitation not in
            (select idHabitation
            from reservation where 
            DATE('%s')>=dateDebut and DATE('%s')<=dateFin))",$idHabitation,$dateDebut,$dateDebut);

            $stmtVerif=$connection->prepare($sqlVerif);
            $stmt=$connection->prepare(sprintf("insert into reservation values(nextval('seqreservation'), %d, '%s', '%s', %d)", $idHabitation, $dateDebut, $dateFin, $idClient));
            $stmtVerif->execute();
            $stockage=$stmtVerif->fetchAll();

            if(count($stockage)>0){
                $stmt->execute();
                return $succes;
            }
            else{
                throw new Exception($error);
            }
        }
    }
?>