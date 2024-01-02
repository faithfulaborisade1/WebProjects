<?php

$first_name = "James";
$last_name = "Ken";
$phoneNo = 12334;
 ?>

<<html>
    <head>
        <title>boss</title>
    </head>
    <body>
        <?php 
        if(empty($first_name) || empty($last_name) ||!is_numeric($phoneNo)){    
            include 'main.php';   
            exit();
            }else{
                echo $first_name;
                echo $last_name;
                echo $phoneNo;
        }?>

    </body>
</html>


