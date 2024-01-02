<?php

$dsn = 'mysql:host=127.0.0.1:3307;dbname=cars';
$username = 'root';
$password='';
$db = new PDO($dsn,$username,$password);

$make_new = $_POST['make'];
$model_new = $_POST['model'];

//$make_new = 'Toyota';
//$model_new = 'Starlet';

$query = "INSERT INTO cars_details(make,model)VALUES('$make_new','$model_new')";

$Insert_count = $db->exec($query)



 ?>
