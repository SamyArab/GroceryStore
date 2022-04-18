<?php
session_start();




if(isset($_POST["addToCart"])){
    if(isset($_SESSION["email"])){
       
          $product = "Lays_Chips 2.99 Qty:";
          $alreadyExists = false;
          
          $array = json_decode($_SESSION["shoppingCart"], true, 512, 0);
            $counter = 0;
          foreach($array as $data1){
              $data = (String)$data1;
              if(str_starts_with($data, $product)){
                  
                
                $alreadyExists = true;
               
              }else{
                  $counter++;
              }
          }

    
          if($alreadyExists == false){
            $product .= (String)$_POST["quantity"];
          array_push($array, ($product . " /Images/snacks/LaysChips.png"));
          $_SESSION["shoppingCart"] = json_encode($array, 0, 512);
          
        }else{
          $x = (int)(substr($array[$counter], stripos($array[$counter],":", 0)+1, stripos($array[$counter], "/Images/snacks/LaysChips.png", 0)));
         
          
          $y = (int)$_POST["quantity"];
      
          $z = $x + $y;
          $data = (String)($z);
              
          $array[$counter] = $product . $data . " /Images/snacks/LaysChips.png";
          $_SESSION["shoppingCart"] = json_encode($array, 0, 512);

        }
         
          

          $xml = simplexml_load_file('../User/users.xml');

          if(!isset($xml)){
              $xml = '<?xml version="1.0" encoding="UTF-8" ?><users></users>';
  
              $xml = simplexml_load_string($xml);
          }
  
          foreach($xml->user as $user){
              if($user->email == $_SESSION["email"]){
                  ;
                  $user->shoppingCart = $_SESSION["shoppingCart"];
                  
              }
              
          }
          $stringinfo = (String)($xml -> asXML());
          
          
          $xmlUserData = fopen("../User/users.xml", 'w');
          $_POST["quantity"] = 1;

        fwrite($xmlUserData, $stringinfo);
        fclose($xmlUserData);

         
           

         
             
         
          
       
          
    }else{

        header("Location: ../User/Pg5LogIn.php", true, 302);
        exit();
       
  
        


    }


    session_write_close();
    
}


?>
<!DOCTYPE html>
<html>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/styles.css" />
    <script type = "text/javascript" src = "/Store/description.js" defer></script>
    <script type="text/javascript" src="/Store/item_properties.js" defer></script>
    <title>Lays Chips</title>
</head>

<body onload="getSavedVal('LaysChips', 2.99)">
    <header class="header">
        <a href="/index.php" class="logo"><img src="/Images/header/logo.png">G-ZONE</a>

        <nav class="navbar">
            <ul class="aisles">
                <li><a href="/Store/aisle_fruit.html">Fruits & Vegetables</a></li>
                <li><a href="/Store/aisle_meat.html">Meats</a></li>
                <li><a href="/Store/aisle_dairy.html">Dairy</a></li>
                <li><a href="/Store/aisle_snacks.html">Snacks</a></li>
                <li><a href="/Store/aisle_bakery.html">Baking</a></li>
<?php if(isset($_SESSION['email'])){ ?>
                        <li><?php echo $_SESSION['email'] ?> </li>
                
                <?php }else{

                 ?>
                 <li></li>
                 <?php } ?>
            </ul>
        </nav>

        <div class="icons">
            <div class="dropdown" role="checkbox"><img src="/Images/header/hambuger-icon.png" alt="Drop down menu">
                <ul class="dropdown-list">
                    <li><a href="/Store/aisle_fruit.html" class="dropdown-content">Fruits & Vegetables</a></li>
                    <li><a href="/Store/aisle_meat.html" class="dropdown-content">Meats</a></li>
                    <li><a href="/Store/aisle_dairy.html" class="dropdown-content">Dairy</a></li>
                    <li><a href="/Store/aisle_snacks.html" class="dropdown-content">Snacks</a></li>
                    <li><a href="/Store/aisle_bakery.html" class="dropdown-content">Bakery</a></li>
                </ul>
            </div>

            <a href="/Store/shopping_cart.php" class="cart"><img src="/Images/header/cart.png" alt="cart-icon"></a>
            <a href="/Store/User/Pg5LogIn.php" class="user"><img src="/Images/header/user.png" alt="user-icon"></a>
        </div>
    </header>

    <main>
        <a href="/Store/aisle_snacks.html" class="back"> BACK </a>



        <div class="item--container">
            <img src="/Images/snacks/LaysChips.png" alt="LaysChips">

            <div class="info">
                <h3 class="name">Lays Chips Original</h3>
                <span class="price">$2.99/bag</span>
                <span class="price" id="price">Total: $2.99</span>
                <form method = "POST">
                <div class="quantity--controls">
                    <button class="quantity--sign minus" onclick="buttonHandling(this, 'LaysChips', 2.99)"><img src="/Images/minus.png" alt="minus sign"></button>
                    <input type="number" name="quantity" min="1" value="1" onchange="buttonHandling(this, 'LaysChips', 2.99)">
                    <button class="quantity--sign plus" onclick="buttonHandling(this, 'LaysChips', 2.99)"><img src="/Images/plus.png" alt="plus sign"></button>
                </div>
                <button class="add--cart" name = "addToCart" onclick = "submitHandling(this)"> ADD TO CART </button>
                </form>
                <button id="more--description"> MORE DESCRIPTION </button>

            </div>
        </div>



        <p class="description dropdown-content"> <span>Description</span>
            <br>A 40g bag of Lay's potato chips. Made from farm-grown potatoes that are cooked and seasoned into a
            perfectly crispy and salty snack.
        </p>



    </main>

</body>

</html>