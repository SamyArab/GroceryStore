<?php
session_start();
$sessionList;

if(isset($_SESSION["email"])){
    $sessionList = json_decode($_SESSION["shoppingCart"], true, 512, 0);
    
    foreach($sessionList as $data){
        print_r($data);
    }
}else{

}


?>



<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="/CSS/cart_styles.css">
<head style = "text-align: left; color:#00D6E9;">
    <a href = "../index.php" >Continue Shopping </a>
    <title>G-ZONE | Shopping Cart</title>
    <script type = "text/javascript" src = "shopping_cart.js" defer></script>

</head>

<body>
    <div class="shoppingCart">
        <div class="listHandling">
            <div class="ListHeader">
                <strong>
                    Item List
                </strong>
            </div>
            <div class="itemList">


                <div class="scrollableList">
                    <ol>


                        <?php

                            if(isset($sessionList)){

                                foreach($sessionList as $data){
                                    $product = explode(" ", $data);
                                    $productName;
                                    $productImgAddress;
                                    $productPrice;
                                    
                                    if(strpos($product[0], "_") !== false){
                                    $productNameCompound = explode("_", $product[0]);
                                    $productName= implode(" ", $productNameCompound);
                                    }else{
                                        $productName = $product[0];
                                    }
                                    $productQty = explode(":", $product[2])[1];
                                    if(isset($product[3])){
                                    $productImgAddress = $product[3];
                                    }else{
                                        $productImgAddress = "";
                                    }
                                    $productPrice = "$".$product[1];
                                   
                                 
                               
                                    
                                    ?>

                                <li>
                                  
                                <div class ="item">
                                
                                <div class="itemDisplay">
                                    <img src= "<?=$productImgAddress?>"></img>
                                </div>
                                <div class="itemDescription">
                                    <?= $productName ?>
                                </div>
                                <div class="itemPrice">
                                    <?=$productPrice?>
                                </div>
                                
                                <button alt = "Minus Sign" name = "minus <?=$productName?>" class ="buttonHandlingMinus" onclick= "buttonHandling(this, <?= $productQty?>)"> <img src = "/Images/minus.png" class = "buttonImages"></button>
                                <div class="itemQuantity">
                                    <span name = "value <?=$productName?>">Qty: x<?=$productQty?></span>
                                </div>
                                <button alt = "Plus Sign" name = "plus <?=$productName?>" class ="buttonHandlingPlus" onclick= "buttonHandling(this, <?= $productQty?>)"> <img src = "/Images/plus.png" class = "buttonImages"></button>
                                
                                <div>
                                    
                               
                                </li>


                                <?php }


                            }



                            ?>
                        
                        


                </div>
                </ol>


            </div>
        </div>

        <div class="moneyHandling">
            <div class="ListHeader">
                <strong>
                    Summary
                </strong>
            </div>
            <div class="scrollableMoneyList">
                <br><br>

                <h3 class = "totalItems">Ground Beef x5 $36.45</h3>
                <h3 class = "totalItems">Halal Beef x2 $14.78</h3>
                <h3 class = "totalItems">Whole Chicken x1 $4.09</h3>

            </div>

            <h1 class = "totalQuantityOfItems">Total Items: 8</h1>
            <br>
            <div class="taxes">
                <h2 class = "QST">QST: $5.39</h2>
                <h2 class = "GST">GST: $2.77</h2>

            </div>
            <div style="height: 5%">
                <hr style="border: 0.25vh solid #00D6E9; background-color:#00D6E9">
            </div>

            <div class="totalSum">
                Total: $63.48
            </div>

        </div>



    </div>




</body>




</html>
