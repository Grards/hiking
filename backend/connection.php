<?php
    function connection(){
        try
        {
            $pdo = new PDO('mysql:host=localhost;dbname=becode;charset=utf8', 'root', '', [
                // Set default exceptions and fetch behaviors
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
            ]);
            return $pdo;
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
?>