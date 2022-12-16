<?php
    include("../classes/SQL_Client_Connection.php");
    include("../classes/Client.php");
    include("../expections/Login_Error.php");
    include("../classes/Reservation.php");
    session_start();
    try {
        $connect = SQL_Admin_Connection::connect();
        $to_return["idClient"] = $_SESSION["client_id"];
        $to_return["idhabitation"] = $_POST["idHabitation"];
        $to_return["dateDebut"] = $_POST["dateDebut"];
        $to_return["dateFin"] = $_POST["dateFin"];
        if(strtotime($to_return["dateDebut"]) > strtotime($to_return["dateFin"])){
            throw new Exception("Start Date and End Date invalid");
        }
        $returns["message"] = Reservation::doReservation($connect, $to_return["idhabitation"], $to_return["idClient"], $to_return["dateDebut"], $to_return["dateFin"]);
        //$client = Client::login($connect, )
        echo json_encode($returns);
    } catch (\Throwable $th) {
        $error["message"] = $th->getMessage();
        echo json_encode($error);
        http_response_code(403);
    }
    
?>