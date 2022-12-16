<?php 
    class SQL_Admin_Connection{
        public static function connect(): PDO{
            return new PDO("pgsql:host=localhost;port=5432;dbname=agence_immo", "agence_frontoffice_service", "etu001844");
        }
    }
?>
