<?php
    class Habitation{
        private int $id;
        private int $type;
        private int $nbChambre;
        private int $quartier;
        private float $loyer;
        private string $adresse;
        private string $description;
        public function set_id(int $id){
            $this->id = $id;
        }
        public function get_id(): int{
            return $this->id;
        }
        public function set_loyer(float $id){
            $this->loyer = $id;
        }
        public function get_loyer(): int{
            return $this->loyer;
        }
        public function set_type(int $id){
            $this->type = $id;
        }
        public function get_type(): int{
            return $this->type;
        }
        public function set_nbChambre(int $nbChambre){
            $this->nbChambre = $nbChambre;
        }
        public function get_nbChambre(): int{
            return $this->nbChambre;
        }
        public function set_quartier(int $id){
            $this->quartier = $id;
        }
        public function get_quartier(): int{
            return $this->quartier;
        }
        public function set_adresse(string $adresse){
            $this->adresse = $adresse;
        }
        public function get_adresse(): string{
            return $this->adresse;
        }
        public function set_description(string $description){
            $this->description = $description;
        }
        public function get_description(): string{
            return $this->description;
        }
        private function __construct(
            int $id,
            int $type,
            int $nbChambre,
            int $quartier,
            string $adresse,
            string $description,
            float $loyer
        )
        {
            $this->set_adresse($adresse);
            $this->set_description($description);
            $this->set_id($id);
            $this->set_nbChambre($nbChambre);
            $this->set_quartier($quartier);
            $this->set_type($type);
            $this->set_loyer($loyer);
        }
        public static function getByID(PDO $connect, int $id) : Habitation{
            $result = $connect->query(sprintf("select * from habitation where idHabitation=%d", $id), PDO::FETCH_OBJ);
            if($result-> rowCount() !=1){
                throw new Exception("There number of habitation is beyond 1");
            }
            $data = $result->fetchObject();
            return new Habitation(
                $data->idhabitation,
                $data->idtype,
                $data->nbrchambre,
                $data->idquartier,
                $data->adresse,
                $data->descript,
                $data->tarifparjour
            );
        }
        public static function getAll(PDO $connect): array{
            $returns = [];
            $result = $connect->query(sprintf("select * from habitation"), PDO::FETCH_OBJ);
            foreach ($result->fetchAll() as $key => $data) {
                $returns[] = new Habitation(
                    $data->idhabitation,
                    $data->idtype,
                    $data->nbrchambre,
                    $data->idquartier,
                    $data->adresse,
                    $data->descript,
                    $data->tarifparjour
                );
            }
            return $returns;
        }
        public static function getAll_good(\PDO $connect) : array{
            $returns = [];
            $result = $connect->query(sprintf("SELECT * from habitation where idHabitation not in (select idHabitation from habitationdefectueux)"), PDO::FETCH_OBJ);
            foreach ($result->fetchAll() as $key => $data) {
                $returns[] = new Habitation(
                    $data->idhabitation,
                    $data->idtype,
                    $data->nbrchambre,
                    $data->idquartier,
                    $data->adresse,
                    $data->descript,
                    $data->tarifparjour
                );
            }
            return $returns;
        }
        public static function create_new(\PDO $connect, int $type, int $nbChambre, int $quartier, float $loyer, string $adresse, string $descript): Habitation{
            $connect->beginTransaction();
            $to_return = null;
            try {
                $connect->exec(sprintf("INSERT INTO habitation VALUES(nextVal('seqHabitation'), %d, %d, %d, '%s', %f,'%s')", $type, $nbChambre, $quartier, $adresse, $loyer, $descript));
                $result = $connect->query(sprintf("Select * from habitation order by idHabitation desc"), PDO::FETCH_OBJ);
                $data = $result->fetchObject();
                $to_return = new Habitation(
                    $data->idhabitation,
                    $data->idtype,
                    $data->nbrchambre,
                    $data->idquartier,
                    $data->adresse,
                    $data->descript,
                    $data->tarifparjour
                );
                $connect->commit();
            } catch (\Throwable $th) {
                $connect->rollBack();
                throw $th;
            }
            return $to_return;
        }
        public function change_loyer(PDO $connect, float $prix, string $date){
            $connect->beginTransaction();
            try{
                $historique = HistoriqueLoyer::create_new($connect, $this->get_id(), $date, $prix);
                $connect->exec("update from habitation set tarifparjour=%f where idHabitation=%i", $historique->get_Prix(), $this->get_id());
                $connect->commit();
                $this->set_loyer($historique->get_Prix());
            }catch(\Throwable $thr){
                $connect->rollBack();
                throw $thr;
            }
        }
    }
?>