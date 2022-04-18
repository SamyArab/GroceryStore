<?php
session_start();

$sessionList;
$newSessionList;
$xml = @simplexml_load_file('User/users.xml');


foreach($xml->user as $user){
    if($user->email == $_SESSION['email']){
       
            
            $_SESSION['shoppingCart'] = (string)$user->shoppingCart;
            break;
    }
}
      



if(isset($_SESSION["email"])){
    $sessionList = json_decode($_SESSION["shoppingCart"], true, 512, 0);
    
   
}else{

}

$counter = count($sessionList)-1;

                              if(isset($_POST["save"])){
                                  
                              for($i = 0; $i <= $counter; $i++){
                                  $productInfoArray = explode(" ", $sessionList[$i]);
                                 $productInfoArray[2] = "Qty:" . $_POST["quantity_" . (String)$i];
                                  
                                 $sessionList[$i] = implode(" ", $productInfoArray);
                                
                                 
                              }
                              
                              $_SESSION["shoppingCart"] = json_encode($sessionList, 0, 512);

                              foreach($xml->user as $user){
                                if($user->email == $_SESSION["email"]){
                                   
                                    $user->shoppingCart = $_SESSION["shoppingCart"];
                                    
                                }
                                
                            }
                            $stringinfo = (String)($xml -> asXML());
                            
                            
                            $xmlUserData = fopen("User/users.xml", 'w');
                  
                          fwrite($xmlUserData, $stringinfo);
                          fclose($xmlUserData);
                          header("Location: shopping_cart.php", true, 302);
                          exit();
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
                <form method = "POST">
                    <ol>


                        <?php
                            
                            if(isset($sessionList)){
                                $counter1 = 0;
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
                                
                                <button alt = "Minus Sign" type = "button" name = "minus <?=$counter1?>" class ="buttonHandlingMinus" onclick= "buttonHandling(this, <?= $productQty?>)"> <img src = "/Images/minus.png" class = "buttonImages"></button>
                               
                                    
                                    <input type="number" name="quantity <?=$counter1?>" min="1" value="<?=$productQty?>" onchange="buttonHandling(this)" class = "itemQuantity">
                                   
                               
                                <button alt = "Plus Sign" type = "button" name = "plus <?=$counter1?>" class ="buttonHandlingPlus" onclick= "buttonHandling(this, <?=$productQty?>)"> <img src = "/Images/plus.png" class = "buttonImages"></button>
                                
                                <div>
                                    
                               
                                </li>


                                <?php $counter1++;}


                                }?>
                        
                        


                </div>
                </ol>


            </div>
            
            
            <button alt = "SAVE" class = "save" name ="save"> Save </button>
                               
                        </form>
        </div>

      

        <div class="moneyHandling">
            <div class="ListHeader">
                <strong>
                    Summary
                </strong>
            </div>
            <div class="scrollableMoneyList">
                <br><br>
                <?php 
                
                if(isset($sessionList)){
                    $QST = 0;
                    $GST = 0;
                    $totalQty = 0;
                    $priceBeforeTax = 0;
                    $totalPrice = 0;
                    
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
                                    $totalQty += (int)$productQty;
                                    
                                    $productPrice = (double)$product[1] * (double)$productQty;
                                    $QST += 0.0975 * $productPrice;
                                    $GST += 0.05 * $productPrice;
                                    $priceBeforeTax += $productPrice;


                
                
                ?>
                <h3 class = "totalItems"><?=$productName?> x<?=$productQty?> $<?=number_format((float)$productPrice, 2, '.', '')?> </h3>

                <?php }}?>
                

            </div>

            <h1 class = "totalQuantityOfItems">Total Items: <?=$totalQty?></h1>
            <br>
            <div class="taxes">
                <h2 class = "QST">QST: $<?=number_format((float)$QST, 2, '.', '')?></h2>
                <h2 class = "GST">GST: $<?=number_format((float)$GST, 2, '.', '')?></h2>

            </div>
            <div style="height: 5%">
                <hr style="border: 0.25vh solid #00D6E9; background-color:#00D6E9">
            </div>

            <div class="totalSum">
                Total: $<?php $totalPrice = $priceBeforeTax + $QST + $GST; echo number_format((float)$totalPrice, 2, '.', '');?>
            </div>

        </div>



    </div>




</body>




</html>
