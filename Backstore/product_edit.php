<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <header class = "header">
        <nav>
            <a class="navbtn" href="./productlist.php">Product List</a>
            <a class="navbtn" href="./userlist.php">User List</a>
            <a class="navbtn" href="./orderlist.html">Order List</a>
        </nav>
    </header>
    <main>
        <div class="pageContainer">

            <form method="POST">
                <div class="editorContainer">
                    <h1 style="align-self: center;">Edit Product</h1>
                    <div class="editArea">
                        <p>Product Name:</p>
                        <input class="editFields" type="text" name="pName" placeholder="Enter product name">
                        <p>Price:</p>
                        <input class="editFields" type="text" name="pPrice" placeholder="Enter product price in dollars">
                        <p>Description:</p>
                        <textarea class="editFields" name="pDesc" id="" cols="30" rows="10" placeholder="Enter information about the product"></textarea>
                    </div>
                    <br>
                    <button class="btn">Save</button>
                </div>
            </form>

        </div>
    </main>
    <footer>

        <span>Made By Tanzir Hoque & Nicholas Piperni</span>
        <a class = "btn" href="/index.php">Go Back</a>
    
    </footer>
</body>


</html>