<?php

    $servername = "localhost";
    $dbname = "slf";
    $user = "root";
    $password = "";

    try {
        $con = new PDO("mysql:host=".$servername.";dbname=".$dbname, $user, $password);
    }
    catch(PDOException $e) {
        print ("Erreur : " . $e->getMessage() . "<br>");
        die();
    }


?>