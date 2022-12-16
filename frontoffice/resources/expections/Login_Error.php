<?php
    class Login_Error extends Exception{
        public function __construct(){
            parent::__construct("Maybe your username or your password is wrong");
        }
    }
?>