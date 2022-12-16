<?php
    function verify_session(string | null $page_to_continue){
        if(!isset($_SESSION["client_id"])){
            header("Location: login.php");
        }elseif($page_to_continue != null){
            header(sprintf("Location : %s", $page_to_continue));
        }
    }
?>