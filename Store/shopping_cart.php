<?php
session_start();
$sessionList;

if(isset($_SESSION["email"])){
    $sessionList = $_SESSION["shoppingCart"];
    
    foreach(json_decode($sessionList, true, 512, 0) as $data){
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
                        <li>


                            <div class="item">


                                <div class="itemDisplay">
                                    <img src="/Images/meat/ground_beef.png" alt="Ground Beef"></img>
                                </div>

                                <div class="itemDescription">
                                    Ground Beef
                                </div>
                                <div class="itemPrice">
                                    $7.29
                                </div>
                                <button alt = "Minus Sign" class ="buttonHandlingMinus" onclick= "buttonHandling(this)"> <img src = "/Images/minus.png" class = "buttonImages"></button>
                                <div class="itemQuantity">
                                    Qty: x5
                                </div>
                                <button alt = "Plus Sign" class ="buttonHandlingPlus" onclick= "buttonHandling(this)"> <img src = "/Images/plus.png" class = "buttonImages"></button>

                            </div>

                        </li>

                        <li>


                            <div class="item">


                                <div class="itemDisplay">
                                    <img src="/Images/meat/halal_beef.png" alt="Halal Beef"></img>
                                </div>

                                <div class="itemDescription">
                                    Halal Beef
                                </div>
                                <div class="itemPrice">
                                    $7.39
                                </div>
                               
                                   <button alt = "Minus Sign" class ="buttonHandlingMinus" onclick= "buttonHandling(this)"> <img src = "/Images/minus.png" class = "buttonImages"></button>
                               
                                <div class="itemQuantity">
                                    Qty: x2
                                </div>
                                <button alt = "Plus Sign" class ="buttonHandlingPlus" onclick= "buttonHandling(this)"> <img src = "/Images/plus.png" class = "buttonImages"></button>
                            </div>

                        </li>

                        <li>


                            <div class="item">


                                <div class="itemDisplay">
                                    <img src="/Images/meat/whole_chicken.png" alt="Whole Chicken"></img>
                                </div>

                                <div class="itemDescription">
                                    Whole Chicken
                                </div>
                                <div class="itemPrice">
                                    $4.09
                                </div>
                                <button alt = "Minus Sign" class ="buttonHandlingMinus" onclick= "buttonHandling(this)"> <img src = "/Images/minus.png" class = "buttonImages"></button>
                                <div class="itemQuantity">
                                    Qty: x1
                                </div>
                                <button alt = "Plus Sign" class ="buttonHandlingPlus" onclick= "buttonHandling(this)"> <img src = "/Images/plus.png" class = "buttonImages"></button>

                            </div>

                        </li>



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
