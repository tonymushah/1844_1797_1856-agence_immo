<?php
    include("../classes/SQL_Client_Connection.php");
    include("../classes/Client.php");
    include("../expections/Login_Error.php");
    try {
        $connect = SQL_Admin_Connection::connect();
        session_start();
        $pseudo = (isset($_POST["pseudo"])) ? $_POST["pseudo"] : throw new Exception("Not valid pseudo");
        $password= (isset($_POST["password"])) ? $_POST["password"] : throw new Exception("Not valid password");
        $client = (Client::login($connect, $pseudo, $password));
        $_SESSION["client_id"] = $client->get_id();
        //$client = Client::login($connect, )
    } catch (\Throwable $th) {
        $error["message"] = $th->getMessage();
        echo json_encode($error);
        http_response_code(403);
    }
?>