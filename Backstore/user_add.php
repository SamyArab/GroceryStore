<?php

if(isset($_POST['add'])){
    $errors = [];

    if(!isset($_POST['uEmail']) || !filter_var($_POST['uEmail'], FILTER_VALIDATE_EMAIL)){
        $errors[] = 'Please enter a valid email';
    }

    if(!isset($_POST['uPsw']) || empty($_POST['uPsw'])){
        $errors[] = 'Please enter a password';
    }

    if(empty($errors)){

        $xml = simplexml_load_file('../Store/User/users.xml');

        if(!isset($xml)){
            $xml = '<?xml version="1.0" encoding="UTF-8" ?><users></users>';

            $xml = simplexml_load_string($xml);
        }

        foreach($xml->user as $user){
            if($user->email == $_POST['uEmail']){
                $errors[] = 'An account with this email address already exists';
                break;
            }
        }
    

        if(empty($errors)){

            $user = $xml->addChild('user');
            $user->addChild('email', $_POST['uEmail']);
            $user->addChild('password', md5(sha1($_POST['uPsw'])));
            $user->addChild('isadmin', false);

            file_put_contents('../Store/User/users.xml', $xml->asXML());

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
    <title>Edit User</title>
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
        
            <form method = "POST">
                <div class="editorContainer">
                    <h1 style="align-self: center;">Add User Profile</h1>
                    <?php
                        if(isset($errors)){
                            if(!empty($errors)){
                                foreach($errors as $error){
                                    echo '- '.$error."<br/>";
                                }
                            }
                            else{
                                echo "Account Added successfully";
                            }
                        }
                    ?>

                    <div class="editArea">
                        <p>User Email:</p>
                        <input class="editFields" name="uEmail" type="text" placeholder="Enter User Email">
                        <p>Password:</p>
                        <input class="editFields" name="uPsw" type="text" placeholder="Create password">
                    </div>
                    <br>
                    <button class="btn" type="add" name="add" value="true">Add</button>
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