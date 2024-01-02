<?php
 $Product_Description = $_POST['product'];
 $List_Price = $_POST['price'];
 $Discount_Percent = $_POST['percent'];
 $Standard_discount = $List_Price/$Discount_Percent;
  $Discount_amount = $List_Price * ($Discount_Percent/100);
 $Discount_price = $List_Price - $Discount_amount;

  
 ?>
<html>
    <head>
        <title>SAGDE</title>
    </head>
    <body>
        <h1>Product Discount Calculator</h1>
        <?php
         echo "Product Description:" .$Product_Description ."<br> "."List Price:". "&euro;".number_format($List_Price,2)."<br> "."Discount Percent:".$Discount_Percent."%"."<br> "."Discount amount:"."&euro;". number_format($Discount_amount,2)."<br> "."Discount price:"."&euro;". number_format($Discount_price,2); ?>

    </body>
</html>


