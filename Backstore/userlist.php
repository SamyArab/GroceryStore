<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <header class ="header">
        <nav>
            <a class="navbtn" href="./productlist.php">Product List</a>
            <a class="navbtn" href="./userlist.php">User List</a>
            <a class="navbtn" href="./orderlist.html">Order List</a>
        </nav>
    </header>
    <main>
        <div class="pageContainer">
        
            <div class="listHeader">
                <h1>Profile List</h1>
                <a class="btn" href="./user_add.php">Add</a>
            </div>
            <div class="itemList">
                <div class="item">
                    <h2 class="itemName">uniProf412@outlook.com</h2>
                    <a class="btn" href="./user_edit.html">Edit</a>
                    <button class="btn">Delete</button>
                </div>
                <div class="item">
                    <h2 class="itemName">groceryShopper1922@gmail.com</h2>
                    <a class="btn" href="./user_edit.html">Edit</a>
                    <button class="btn">Delete</button>
                </div>
                <div class="item">
                    <h2 class="itemName">spectacularJohn444@yahoo.ca</h2>
                    <a class="btn" href="./user_edit.html">Edit</a>
                    <button class="btn">Delete</button>
                </div>
                <div class="item">
                    <h2 class="itemName">munchlax111@gmail.com</h2>
                    <a class="btn" href="./user_edit.html">Edit</a>
                    <button class="btn">Delete</button>
                </div>
            </div>
        </div>
    </main>
    <footer>

        <span>Made By Tanzir Hoque & Nicholas Piperni</span>
        <a class = "btn" href="/index.php">Go Back</a>
    
    </footer>
</body>


</html>