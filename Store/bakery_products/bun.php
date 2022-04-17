<?php
session_start();




if(isset($_POST["addToCart"])){
    if(isset($_SESSION["email"])){
       
          $product = "Buns 5.99 Qty:";
          $alreadyExists = false;
          
          $array = json_decode($_SESSION["shoppingCart"], true, 512, 0);
            $counter = 0;
          foreach($array as $data1){
              $data = (String)$data1;
              if($data.str_starts_with($product, 0)){
                  
                
                $alreadyExists = true;
               
              }else{
                  $counter++;
              }
          }

           


          if($alreadyExists == false){
              $product .= (String)$_POST["quantity"];
            array_push($array, ($product));
            $_SESSION["shoppingCart"] = json_encode($array, 0, 512);
            
          }else{
            $x = (int)(substr($array[$counter], stripos($array[$counter],":", 0)+1, strlen($array[$counter])));
           
            
            $y = (int)$_POST["quantity"];
        
            $z = $x + $y;
            $data = (String)($z);
                
            $array[$counter] = $product . $data;
            $_SESSION["shoppingCart"] = json_encode($array, 0, 512);

          }
         
          

          $xml = simplexml_load_file('users.xml');

          if(!isset($xml)){
              $xml = '<?xml version="1.0" encoding="UTF-8" ?><users></users>';
  
              $xml = simplexml_load_string($xml);
          }
  
          foreach($xml->user as $user){
              if($user->email == $_SESSION["email"]){
                  $user->shopping_cart = $_SESSION["shoppingCart"];
              }
          }
      
          

         
           

         
             
         
          
       
          
    }else{

        if(!isset($_COOKIE["shoppingCart"])){
            setcookie("shoppingCart", "", 3600*4);
        }

        $product = "Buns 5.99 Qty:";
        $alreadyExists = false;
        
        $array = json_decode($_COOKIE["shoppingCart"], true, 512, 0);
          $counter = 0;
        foreach($array as $data1){
            $data = (String)$data1;
            if($data.str_starts_with($product, 0)){
                
              
              $alreadyExists = true;
             
            }else{
                $counter++;
            }
        }

         


        if($alreadyExists == false){
            $product .= (String)$_POST["quantity"];
          array_push($array, ($product));
          $_COOKIE["shoppingCart"] = json_encode($array, 0, 512);
          
        }else{
          $x = (int)(substr($array[$counter], stripos($array[$counter],":", 0)+1, strlen($array[$counter])));
         
          
          $y = (int)$_POST["quantity"];
      
          $z = $x + $y;
          $data = (String)($z);
              
          $array[$counter] = $product . $data;
          $_COOKIE["shoppingCart"] = json_encode($array, 0, 512);

        }
       
        

        


    }


    session_write_close();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/styles.css" />
    <script type = "text/javascript" src = "/Store/description.js" defer></script>
    <script type="text/javascript" src="/Store/item_properties.js" defer></script>
    <title>Buns</title>
</head>

<body onload="getSavedVal('Bun', 5.99)">
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
        <a href="/Store/aisle_bakery.html" class="back"> BACK </a>



        <div class="item--container">
        <img src="/Images/bakery/bun.jpg" alt="Bun">

        <div class="info">
            <h3 class="name">Bun</h3>
            <span class="price">$5.99/ea</span>
            <span class="price" id="price">Total: $5.99</span>
            <form>
            <div class="quantity--controls">
                <button class="quantity--sign minus" onclick="buttonHandling(this, 'Bun', 5.99)"><img src="/Images/minus.png" alt="minus sign"></button>
                <input type="number" name="quantity" min="1" value="1" onchange="buttonHandling(this, 'Bun', 5.99)">
                <button class="quantity--sign plus" onclick="buttonHandling(this, 'Bun', 5.99)"><img src="/Images/plus.png" alt="plus sign"></button>
            </div>
            <button class="add--cart" name = "addToCart"> ADD TO CART </button>
                </form>
            <button id="more--description"> MORE DESCRIPTION </button>

        </div>
    </div>



    <p class="description"> <span>Description</span>
        <br>Your family will love the taste of Buns for your burger and sandwich nights. Our buns are low in fat with no cholesterol and this 8-pack ensures there are plenty to go around.
    </p>



</main>


</html>