<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/styles.css" />
    <title>Dairy</title>
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
        <h2 class="item--title">Dairy and Eggs</h2>

        <section class="item--list">

            <a href="/Store/dairy_products/milk.php " style="text-decoration: inherit; color: inherit;">
                <div class="items">
                    <img src="/Images/dairy/milk.png" alt="milk">
                    <div class="item--info">
                        <div class="item--labels">
                            <h3>Milk</h3>
                            <span class="price">$2.19/each</span>
                        </div>
                    </div>
                </div>
            </a>

            <a href="/Store/dairy_products/chocolate_milk.php " style="text-decoration: inherit; color: inherit;">
                <div class="items">
                    <img src="/Images/dairy/chocolate_milk.png" alt="chocolate milk">
                    <div class="item--info">
                        <div class="item--labels">
                            <h3>Chocolate Milk</h3>
                            <span class="price">$3.29/each</span>
                        </div>
                    </div>
                </div>
            </a>

            <a href="/Store/dairy_products/butter.php " style="text-decoration: inherit; color: inherit;">
                <div class="items">
                    <img src="/Images/dairy/butter.png" alt="butter">
                    <div class="item--info">
                        <div class="item--labels">
                            <h3>Butter</h3>
                            <span class="price">$4.99/each</span>
                        </div>
                    </div>
                </div>
            </a>

            <a href="/Store/dairy_products/cheese.php" style="text-decoration: inherit; color: inherit;">
                <div class="items">
                    <img src="/Images/dairy/cheese.png" alt="cheese">
                    <div class="item--info">
                        <div class="item--labels">
                            <h3>Cheese</h3>
                            <span class="price">$5.79/each</span>
                        </div>
                    </div>
                </div>
            </a>

            <a href="/Store/dairy_products/ice_cream.php" style="text-decoration: inherit; color: inherit;">
                <div class="items">
                    <img src="/Images/dairy/ice_cream.png" alt="ice cream">
                    <div class="item--info">
                        <div class="item--labels">
                            <h3>Ice Cream</h3>
                            <span class="price">$6.59/each</span>
                        </div>
                    </div>
                </div>
            </a>

            <a href="/Store/dairy_products/eggs.php" style="text-decoration: inherit; color: inherit;">
                <div class="items">
                    <img src="/Images/dairy/eggs.png" alt="eggs">
                    <div class="item--info">
                        <div class="item--labels">
                            <h3>Eggs</h3>
                            <span class="price">$5.94/each</span>
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