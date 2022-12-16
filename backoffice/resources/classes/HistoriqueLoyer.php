<?php
    class HistoriqueLoyer{
        private int $id;
        private int $idHabitation;
        private string $date;
        private float $prix;
        /**
         * Get the value of prix
         */ 
        public function get_Prix()
        {
                return $this->prix;
        }

        /**
         * Set the value of prix
         *
         * @return  void
         */ 
        public function set_Prix(float $prix)
        {
                $this->prix = $prix;
        }

        /**
         * Get the value of date
         */ 
        public function get_Date()
        {
                return $this->date;
        }

        /**
         * Set the value of date
         *
         * @return  void
         */ 
        public function set_Date(string $date)
        {
                $this->date = $date;
        }

        /**
         * Get the value of idHabitation
         */ 
        public function get_IdHabitation()
        {
                return $this->idHabitation;
        }

        /**
         * Set the value of idHabitation
         *
         * @return  self
         */ 
        public function set_IdHabitation(int $idHabitation)
        {
                $this->idHabitation = $idHabitation;
        }

        /**
         * Get the value of id
         */ 
        public function get_Id()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function set_Id(int $id)
        {
                $this->id = $id;
        }
        public function __construct(
            int $id,
            int $idHabitation,
            string $date,
            float $prix
        ){
            $this->set_Date($date);
            $this->set_Id($id);
            $this->set_IdHabitation($idHabitation);
            $this->set_Prix($prix);
        }
        public static function getByID(PDO $connection, int $id): HistoriqueLoyer{
            $result = $connection->query(sprintf("SELECT * from historiqueLoyer where idLoyer=%d", $id), PDO::FETCH_OBJ);
            if($result->rowCount() != 1){
                throw new Exception("There should be 1 object for this ID");
            }
            $data = $result->fetchObject();
            return new HistoriqueLoyer(
                $data->idloyer, 
                $data->idhabitation, 
                $data->daty,
                $data->prix
            );
        }
        public static function getAll(PDO $connection) : array{
            $returns = [];
            $result = $connection->query(sprintf("SELECT * from historiqueLoyer"), PDO::FETCH_OBJ);
            foreach ($result->fetchAll() as $key => $data) {
                $returns[] = new HistoriqueLoyer(
                    $data->idloyer, 
                    $data->idhabitation, 
                    $data->daty,
                    $data->prix
                );
            }
            return $returns;
        }
        public static function getByHabitation(PDO $connection, int $id) : array{
            $returns = [];
            $result = $connection->query(sprintf("SELECT * from historiqueLoyer where idHabitation=%d", $id), PDO::FETCH_OBJ);
            foreach ($result->fetchAll() as $key => $data) {
                $returns[] = new HistoriqueLoyer(
                    $data->idloyer, 
                    $data->idhabitation, 
                    $data->daty,
                    $data->prix
                );
            }
            return $returns;
        }
        public static function create_new(PDO $connection, int $idHabit, string $dateTime, float $price) : HistoriqueLoyer{
            $connection->exec("insert into historiqueLoyer values(nextVal('seqHistoriqueLoyer'), %d, '%s', %f)", $idHabit, $dateTime, $price);
            $result = $connection->query(sprintf("SELECT * from historiqueLoyer where idHabitation=%d order by idLoyer desc limit(1)", $idHabit), PDO::FETCH_OBJ);
            if($result->rowCount() != 1){
                throw new Exception("There should be 1 object for this ID");
            }
            $data = $result->fetchObject();
            return new HistoriqueLoyer(
                $data->idloyer, 
                $data->idhabitation, 
                $data->daty,
                $data->prix
            );
        }
    }
?>