<?php

try{
    $dsn = 'mysql:host=127.0.0.1:3307;dbname=cars';
    $username = 'root';
    $password='';
    $db = new PDO($dsn,$username,$password);
    
    //$cars = $db->query('SELECT * FROM car_details');

    echo 'Database Created';
    
} catch (PDOException $ex) {
    $error_message = $ex ->getMessage();
    echo"<p> An error occcured while connecting to the database: $error_message </p>";

}



?>