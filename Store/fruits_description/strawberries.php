<?php
session_start();




if(isset($_POST["addToCart"])){
    if(isset($_SESSION["email"])){
       
          $product = "Strawberries 0.39 Qty:";
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
          array_push($array, ($product . " /Images/f&v/strawberries.png"));
          $_SESSION["shoppingCart"] = json_encode($array, 0, 512);
          
        }else{
          $x = (int)(substr($array[$counter], stripos($array[$counter],":", 0)+1, stripos($array[$counter], "/Images/f&v/strawberries.png", 0)));
         
          
          $y = (int)$_POST["quantity"];
      
          $z = $x + $y;
          $data = (String)($z);
              
          $array[$counter] = $product . $data . " /Images/f&v/strawberries.png";
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/styles.css"/>
    <script type = "text/javascript" src = "/Store/description.js" defer></script>
    <title>Strawberries</title>
</head>

<body onload="getSavedVal('Strawberries', 0.39)">
    <header class="header">
        <a href="/index.php" class="logo"><img src="/Images/header/logo.png">G-ZONE</a>

        <nav class="navbar">
            <ul class="aisles">
                <li><a href="/Store/aisle_fruit.php">Fruits & Vegetables</a></li>
                <li><a href="/Store/aisle_meat.php">Meats</a></li>
                <li><a href="/Store/aisle_dairy.php">Dairy</a></li>
                <li><a href="/Store/aisle_snacks.php">Snacks</a></li>
                <li><a href="/Store/aisle_bakery.php">Baking</a></li>
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
                    <li><a href="/Store/aisle_fruit.php" class="dropdown-content">Fruits & Vegetables</a></li>
                    <li><a href="/Store/aisle_meat.php" class="dropdown-content">Meats</a></li>
                    <li><a href="/Store/aisle_dairy.php" class="dropdown-content">Dairy</a></li>
                    <li><a href="/Store/aisle_snacks.php" class="dropdown-content">Snacks</a></li>
                    <li><a href="/Store/aisle_bakery.php" class="dropdown-content">Bakery</a></li>
                </ul>
            </div>

            <a href="/Store/shopping_cart.php" class="cart"><img src="/Images/header/cart.png" alt="cart-icon"></a>
            <a href="/Store/User/Pg5LogIn.php" class="user"><img src="/Images/header/user.png" alt="user-icon"></a>
        </div>
    </header>


    <main>
        <a href="/Store/aisle_fruit.php" class="back">BACK</a>

        <div class="item--container">
            <img src="/Images/f&v/strawberries.png">
            
            <div class="info">
                <h3 class="name">Delicious Strawberries</h3>
                <span class="price">$.39/each</span>
                <span class="price" id="price">Total: $0.39</span>
                <form method = "POST">
                <div class="quantity--controls">
                    <button class="quantity--sign minus" onclick="buttonHandling(this, 'Strawberries', 0.39)"><img src="/Images/minus.png" alt="minus sign"></button>
                    <input type="number" name="quantity" min="1" value="1" onchange="buttonHandling(this, 'Strawberries', 0.39)">
                    <button class="quantity--sign plus" onclick="buttonHandling(this, 'Strawberries', 0.39)"><img src="/Images/plus.png" alt="plus sign"></button>
                </div>
                <button class="add--cart" name = "addToCart" onclick = "submitHandling('Strawberries')">ADD TO CART</button>
                </form>
                <button id="more--description">MORE DESCRIPTION</button>
            </div>

            
        </div>

        <p class="description"> <span>DESCRIPTION</span> <br> Strawberries have a juicy, sweet 
            flavor many people love. This delicious heart-shaped berry is also loaded with vitamins and minerals to 
            help you stay healthy. They are an excellent source of vitamin C and manganese as well as a good source of dietary fiber.
        </p>

    </main>

    <footer>

    </footer>

</body>
</html>