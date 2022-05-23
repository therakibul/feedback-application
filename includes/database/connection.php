<?php  
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "feedback";
    $connection = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
    if($connection->connect_error){
        die("Db connection failed ". $connection->connect_error);
    }


?>