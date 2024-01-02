<?php
    $dsn = 'mysql:host=localhost:3307;dbname=racing';
    $username = 'root';
    $password = '';

    try {
        $db = new PDO($dsn, $username, $password);
        echo"Coonected to database";
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
?>