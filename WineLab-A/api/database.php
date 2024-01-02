<?php
	//this needs to be changed to match your port and database name
    $dsn = 'mysql:host=127.0.0.1:3307;dbname=slim_cellar';
    $username = 'root';
    $password = '';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
		echo 'DB error';
        exit();
    }
?>