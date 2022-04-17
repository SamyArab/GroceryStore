<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css"/>
    <script type = "text/javascript" src = "/Store/description.js" defer></script>
    <script type="text/javascript" src="/Store/item_properties.js" defer></script>
    <title>Cauliflower</title>
</head>

<body onload="getSavedVal('Cauliflower', 1.19)">
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
        <a href="/Store/aisle_fruit.html" class="back">BACK</a>

        <div class="item--container">
            <img src="/Images/f&v/cauliflower.png">
            
            <div class="info">
                <h3 class="name">Cauliflower</h3>
                <span class="price">$1.19/each</span>
                <span class="price" id="price">Total: $1.19</span>
                <div class="quantity--controls">
                    <button class="quantity--sign minus" onclick="buttonHandling(this, 'Cauliflower', 1.19)"><img src="/Images/minus.png" alt="minus sign"></button>
                    <input type="number" name="quantity" min="1" value="1" onchange="buttonHandling(this, 'Cauliflower', 1.19)">
                    <button class="quantity--sign plus" onclick="buttonHandling(this, 'Cauliflower', 1.19)"><img src="/Images/plus.png" alt="plus sign"></button>
                </div>
                <button class="add--cart" name = "addToCart">ADD TO CART</button>
                <button id="more--description">MORE DESCRIPTION</button>
            </div>

            
        </div>

        <p class="description"> <span>DESCRIPTION</span> <br>Excellent Source of Vitamin C, which supports a healthy immune system.
            Excellent Source of Vitamin K, which supports normal blood clotting.
            Good Source of Vitamin B6, which helps support the nervous system.
            Good Source of Folate, which helps maintain a healthy heart.
        </p>

    </main>

    <footer>

    </footer>

</body>
</html>