<?php
    $dsn = 'mysql:host=localhost:3307;dbname=cellar';
    $username = 'root';
    $password = '123';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
//        include('database_error.php');
        exit();
    }
?>