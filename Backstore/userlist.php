<?php
    session_start();

    $xml = @simplexml_load_file('../Store/User/users.xml');
    if(isset($_POST["deleteUser"])){
        foreach($xml->user as $user){
            if($user->email == $_POST["deleteUser"]){
                unset($user[0]);
                $xml->asXML('../Store/User/users.xml');
                break;
            }
        }
    }

?>


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
            <a class="navbtn" href="./orderlist.php">Order List</a>
            <a class="navbtn" href="#"><?= $_SESSION['email'] ?></a>
        </nav>
    </header>
    <main>
        <div class="pageContainer">
        
            <div class="listHeader">
                <h1>Profile List</h1>
                <a class="btn" href="./user_add.php">Add</a>
            </div>

            <div class="itemList" id="emails">
                <?php
                    foreach($xml ->user as $user){
                        print "<div class = \"item\">";
                        print "<h2 class = \"itemName\">$user->email</h2>";

                        print "<form action=\"./user_edit.php\" method=\"post\">";
                        print "<input type=\"hidden\" name=\"editEmail\" value=\"$user->email\">";
                        print "<input type=\"hidden\" name=\"editPsw\" value=\"$user->password\">";
                        print "<input type=\"submit\" name=\"edit\" value=\"Edit\" class=\"btn\">";
                        print "</form>";

                        print "<form method=\"post\">";
                        print "<input type=\"hidden\" name=\"deleteUser\" value=\"$user->email\">";
                        print "<input type=\"submit\" name=\"delete\" value=\"Delete\" class=\"btn\" style=\"float: right; margin-left: 50px;\">";
                        print "</form>";

                        print "</div>";

                    }
                ?>
            </div>
        </div>

    </main>
    <footer>

        <span>Made By Tanzir Hoque & Nicholas Piperni</span>
        <a class = "btn" href="/index.php">Go Back</a>
    
    </footer>
</body>


</html>