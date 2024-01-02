<?php
$dsn = 'mysql:host=127.0.0.1:3307;dbname=cars';
$username = 'root';
$password='';
$db = new PDO($dsn,$username,$password); 

$query = 'SELECT * FROM cars_details';
$cars = $db->query($query);
?>


<html>
    <head>
        <title>Data</title>
    </head>
    <body>
        
        <?php foreach ($cars as $value):?>

        <tr>
            <td> <?php echo $value['id'];?></td>
            <td> <?php echo $value['make'];?></td>
            <td> <?php echo $value['model'];?></td>
        </tr>

 

        <?php endforeach; ?>

    </body>
</html>


