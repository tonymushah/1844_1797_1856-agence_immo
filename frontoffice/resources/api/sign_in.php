<?php
    include("../classes/SQL_Client_Connection.php");
    include("../classes/Client.php");
    include("../expections/Login_Error.php");
    try {
        $connect = SQL_Admin_Connection::connect();
        session_start();
        $pseudo = (isset($_POST["pseudo"])) ? $_POST["pseudo"] : throw new Exception("Not valid pseudo");
        $password= (isset($_POST["password"]) && $_POST["password"] === $_POST["conf-password"]) ? $_POST["password"] : throw new Exception("Not valid password");
        $name = (isset($_POST["nom"])) ? $_POST["nom"] : throw new Exception("Not valid name");
        $email = (isset($_POST["email"])) ? $_POST["email"] : throw new Exception("Not valid email");
        $telephone = (isset($_POST["telephone"])) ? $_POST["telephone"] : throw new Exception("Not valid telephone");
        $client = (Client::inscription($connect, $name, $pseudo, $password, $telephone, $email));
        $_SESSION["client_id"] = $client->get_id();
    } catch (\Throwable $th) {
        $error["message"] = $th->getMessage();
        echo json_encode($error);
        http_response_code(403);
    }
?>