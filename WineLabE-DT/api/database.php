<?php
    $dsn = 'mysql:host=127.0.0.1:3307;dbname=cellar';
    $username = 'root';
    $password = '123';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
		echo 'DB error';
        exit();
    }
?>