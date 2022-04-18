<?php


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <header class ="header">
        <nav>
            <a class="navbtn" href="./productlist.php">Product List</a>
            <a class="navbtn" href="./userlist.php">User List</a>
            <a class="navbtn" href="./orderlist.php">Order List</a>
        </nav>
    </header>
    <main>
        <div class="pageContainer">
        
            <form method = "POST">
                <div class="editorContainer">
                    <h1 style="align-self: center;">Edit User Profile</h1>
                    <div class="editArea">
                        <p>User Email:</p>
                        <input class="editFields" name="uEmail" type="text" placeholder="Edit User Email">
                        <p>Password:</p>
                        <input class="editFields" name="uPsw" type="text" placeholder="Enter password">
                    </div>
                    <br>
                    <button class="btn" type="save" name="save" value="true">Save</button>
                </div>
            </form>

        </div>
    </main>
</body>
<footer>

    <span>Made By Tanzir Hoque & Nicholas Piperni</span>
    <a class = "btn" href="/index.php">Go Back</a>

</footer>

</html>