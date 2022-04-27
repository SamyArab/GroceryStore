<!DOCTYPE html>

<html lang="eng">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/CSS/styles.css" />
    <title>G-ZONE | F&V</title>
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
        <h2 class="item--title">FRUITS</h2>
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

            <a href="/Store/fruits_description/strawberries.php" style="text-decoration: inherit; color: inherit;">
                <div class="items">
                    <img src="/Images/f&v/strawberries.png">
                    <div class="item--info">
                        <div class="item--labels">
                            <h3>Strawberries</h3>
                            <span class="price">$.39/each</span>
                        </div>
                    </div>
                </div>
            </a>

            <a href="/Store/fruits_description/apricots.php" style="text-decoration: inherit; color: inherit;">
            <div class="items">
                    <img src="/Images/f&v/apricots.png">
                    <div class="item--info">
                        <div class="item--labels">
                            <h3>Apricots</h3>
                            <span class="price">$1.19/each</span>
                        </div>
                    </div>
                </div>
            </a>
        </section>

        <!-- VEGETABLES -->

        <h2 class="item--title">VEGETABLES</h2>
        <section class="item--list">
            
            <a href="/Store/fruits_description/artichokes.php" style="text-decoration: inherit; color: inherit;">
                <div class="items">
                    <img src="/Images/f&v/artichokes.png">
                    <div class="item--info">
                        <div class="item--labels">
                            <h3>Artichokes</h3>
                            <span class="price">$1.99/each</span>
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

            <a href="/Store/fruits_description/broccoli.php" style="text-decoration: inherit; color: inherit;">
                <div class="items">
                    <img src="/Images/f&v/broccoli.png">
                    <div class="item--info">
                        <div class="item--labels">
                            <h3>Broccoli</h3>
                            <span class="price">$1.99/each</span>
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

    </section>
    </main>


    <footer class="footer">
        <div class="footer--container">
            <h5>This page was made by: Samy Arab</h5>
            <a href="/Backstore/productlist.php">Access the Backstore</a>
        </div>
    </footer>
</body>

</html>