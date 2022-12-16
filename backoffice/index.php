<?php
    include("./resources/classes/SQL_Client_Connection.php");
    try {
        SQL_Admin_Connection::connect();
        echo "Connected";
    } catch (\Throwable $th) {
        echo $th->getMessage();
    }
?>
