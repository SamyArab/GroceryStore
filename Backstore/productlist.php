<?php
session_start();
print_r($_SESSION);
if(!isset($_SESSION['is_admin']) || @$_SESSION['is_admin'] == false){
    echo 'UNAUTHORIZED';
    die;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="./style.css">
    
</head>



<body>
    <header class = "header">
        <nav>
            <a class="navbtn" href="./productlist.html">Product List</a>
            <a class="navbtn" href="./userlist.html">User List</a>
            <a class="navbtn" href="./orderlist.html">Order List</a>
        </nav>
    </header>

   

  
    <main>
        <div class="pageContainer">
        
        
            <div class="listHeader">
               <h1>Product List</h1>
               <a class="btn" href="./product_edit.html">Add</a>
            </div>
            <div class="itemList">
                <div class="item">
                    <img class="itemImg" src="./images/milk.png" alt="milk">
                    <h2 class="itemName">Milk</h2>
                    <a class="btn" href="./product_edit.html">Edit</a>
                    <button class="btn">Delete</button>
                </div>
                <div class="item">
                    <img class="itemImg" src="./images/chocolate_milk.png" alt="chocolate milk">
                    <h2 class="itemName">Chocolate Milk</h2>
                    <a class="btn" href="./product_edit.html">Edit</a>
                    <button class="btn">Delete</button>
                </div>
                <div class="item">
                    <img class="itemImg" src="./images/butter.png" alt="butter">
                    <h2 class="itemName">Butter</h2>
                    <a class="btn" href="./product_edit.html">Edit</a>
                    <button class="btn">Delete</button>
                </div>
                <div class="item">
                    <img class="itemImg" src="./images/Whole Chicken.png" alt="whole chicken">
                    <h2 class="itemName">Whole Chicken</h2>
                    <a class="btn" href="./product_edit.html">Edit</a>
                    <button class="btn">Delete</button>
                </div>
            </div>
        </div>
    </main>

    <footer>

        <span>Made By Tanzir Hoque & Nicholas Piperni</span>
        <a class = "btn" href="/index.html">Go Back</a>

    </footer>

</body>
</html>