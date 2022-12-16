<?php
function dbconnect()
{
    static $connect = null;
    if ($connect === null) {
        $connect = new PDO("mysql:host=localhost;dbname=Produit",'root','root');
    }
    return $connect;
}

?>