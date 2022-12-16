<?php
include("connexionbdd.php");
//mamoaka ny donne rehetra ao anaty table
function allFeatured($nomTable){
    $requete="select * from ".$nomTable;
    $con=dbconnect();
    $stmt=$con->prepare($requete);
    $stmt->execute();
    $miseho=$stmt->fetchall();
    return $miseho;
}
?>