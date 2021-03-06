<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/styles.css"/>

    <title>GROCERY ZONE</title>
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





    <main class="main--home">
        <h1 class="banner title">WELCOME TO GROCERY-ZONE</h1>
        <div class="img--container">
            <img src="/Images/store/home-bg.jpg" alt="Vegetables" style="text-decoration: inherit; color: inherit;">
        </div>

        <h2 class="title">FEATURED ITEMS</h2>
        <div class="featured--items">
            <section class="item--list">

                <a href="/Store/fruits_description/apples.php" style="text-decoration: inherit; color: inherit;">
                    <div class="items">
                            <img src="/Images/f&v/apples.png">
                        <div class="item--info">
                            <div class="item--labels">
                                <h3>Apples</h3>
                                <span class="price">$.99/each</span>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="/Store/fruits_description/mangos.php" style="text-decoration: inherit; color: inherit;">
                    <div class="items">
                        <img src="/Images/f&v/mangos.png">
                        <div class="item--info">
                            <div class="item--labels">
                                <h3>Mangos</h3>
                                <span class="price">$1.59/each</span>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="/Store/fruits_description/oranges.php" style="text-decoration: inherit; color: inherit;">
                    <div class="items">
                        <img src="/Images/f&v/oranges.png">
                        <div class="item--info">
                            <div class="item--labels">
                                <h3>Oranges</h3>
                                <span class="price">$1.29/each</span>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="/Store/fruits_description/asparagus.php" style="text-decoration: inherit; color: inherit;">
                    <div class="items">
                        <img src="/Images/f&v/asparagus.png">
                        <div class="item--info">
                            <div class="item--labels">
                                <h3>Asparagus</h3>
                                <span class="price">$.19/each</span>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="/Store/fruits_description/cauliflower.php" style="text-decoration: inherit; color: inherit;">
                    <div class="items">
                        <img src="/Images/f&v/cauliflower.png">
                        <div class="item--info">
                            <div class="item--labels">
                                <h3>Cauliflower</h3>
                                <span class="price">$1.19/each</span>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="/Store/fruits_description/onions.php" style="text-decoration: inherit; color: inherit;">
                    <div class="items">
                        <img src="/Images/f&v/onions.png">
                        <div class="item--info">
                            <div class="item--labels">
                                <h3>Onions</h3>
                                <span class="price">$.39/each</span>
                            </div>
                        </div>
                    </div>
                </a>

                </section>
        </div>



        
        <h2 class="title">AISLES</h2>
        <div class="aisles">
            

            <section class="item--list">

                <div class="items">
                        <img src="/Images/store/fruits&veggies.png" alt="Fruits & Vegetables">
                        <div class="item--info">
                            
                            <div class="item--labels">
                                <h3>Fruits & Vegetables</h3>
                            </div>
    
                            <div class="item--btns">
                                <a href="/Store/aisle_fruit.php" class="aisle--link">GO TO AISLE</a>
                            </div>
                            
                        </div>
                </div>


                <div class="items">
                    <img src="/Images/store/meats.png" alt="Meats">
                    <div class="item--info">

                        <div class="item--labels">
                            <h3>Meats</h3>
                        </div>

                        <div class="item--btns">
                            <a href="/Store/aisle_meat.php" class="aisle--link">GO TO AISLE</a>
                        </div>
                    </div>
                </div>


                <div class="items">
                    <img src="/Images/store/dairy.png" alt="Dairy">

                    <div class="item--info">
                        
                        <div class="item--labels">
                            <h3>Dairy</h3>
                        </div>

                        <div class="item--btns">
                            <a href="/Store/aisle_dairy.php" class="aisle--link">GO TO AISLE</a>
                        </div>

                    </div>
                </div>

                <div class="items">
                    <img src="/Images/store/snacks.png" alt="Snacks">

                    <div class="item--info">
                        
                        <div class="item--labels">
                            <h3>Snacks</h3>
                        </div>

                        <div class="item--btns">
                            <a href="/Store/aisle_snacks.php" class="aisle--link">GO TO AISLE</a>
                        </div>

                    </div>
                </div>

                <div class="items">
                    <img src="/Images/store/bakery.png" alt="Bakery">

                    <div class="item--info">
                        
                        <div class="item--labels">
                            <h3>Bakery</h3>
                        </div>

                        <div class="item--btns">
                            <a href="/Store/aisle_bakery.php" class="aisle--link">GO TO AISLE</a>
                        </div>

                    </div>
                </div>
            </section>

        </div>
    </main>


    <footer class="footer">
        <div class="footer--container">
            <h5>This page was made by: Samy Arab</h5>
            <a href="/Backstore/productlist.php">Access the Backstore</a>
        </div>
    </footer>
</body>



</html>