<!DOCTYPE html>

<html lang="eng">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/styles.css" />
    <title>G-Zone | Bakery</title>
</head>


<body>
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
        <h2 class="item--title">
            Bakery
        </h2>
        <section class="item--list">
            
            <a href="/Store/bakery_products/bread.php" style="text-decoration: inherit; color: inherit;">
                <div class="items">
                    <img src="/Images/bakery/bread.png">
                    <div class="item--info">
                        <div class="item--labels">
                            <h3>Bread</h3>
                            <span class="price">$3.49 ea</span>
                        </div>    
                    </div>
                </div>
            </a>
    
            <a href="/Store/bakery_products/bagels.php" style="text-decoration: inherit; color: inherit;">
                <div class="items">
                    <img src="/Images/bakery/bagels.jpg">
                    <div class="item--info">
                        <div class="item--labels">
                            <h3>Bagels</h3>
                            <span class="price">$2.97/ea</span>
                        </div>    
                    </div>
                </div>
            </a>
    
            <a href="/Store/bakery_products/bun.php" style="text-decoration: inherit; color: inherit;">
                <div class="items">
                    <img src="/Images/bakery/bun.jpg">
                    <div class="item--info">
                        <div class="item--labels">
                            <h3>Buns</h3>
                            <span class="price">$5.99 ea</span>
                        </div>    
                    </div>
                </div>
            </a>

            <a href="/Store/bakery_products/croissant.php" style="text-decoration: inherit; color: inherit;">
                <div class="items">
                    <img src="/Images/bakery/croissant.jpg">
                    <div class="item--info">
                        <div class="item--labels">
                            <h3>Croissant</h3>
                            <span class="price">$1.99/ea</span>
                        </div>
                    </div>
                </div>
            </a>
    
            <a href="/Store/bakery_products/pie.php" style="text-decoration: inherit; color: inherit;">
                <div class="items">
                    <img src="/Images/bakery/pie.jpg">
                    <div class="item--info">
                        <div class="item--labels">
                            <h3>Apple Pie</h3>
                            <span class="price">$10.99/ea</span>
                        </div>    
                    </div>
                </div>
            </a>
    
            <a href="/Store/bakery_products/pita.php" style="text-decoration: inherit; color: inherit;">
                <div class="items">
                    <img src="/Images/bakery/pita.jpg">
                    <div class="item--info">
                        <div class="item--labels">
                            <h3>Pita</h3>
                            <span class="price">$1.69/ea</span>
                        </div>    
                    </div>
                </div>
            </a>
    
        </section>
    </main>


    <footer class="footer">
        <div class="footer--container">
            <h5>This page was styled by: Samy Arab</h5>
            <a href="/Backstore/productlist.php">Access the Backstore</a>
        </div>
    </footer>
</body>


</html>