<?php
// connects to db from benchmark with name //
    $dsn = 'mysql:host=localhost:3307;dbname=library';
    $username = 'root';
    $password = '123';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        exit();
    }
?>