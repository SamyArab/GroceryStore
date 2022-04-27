<?php
    session_start();
    if(isset($_POST["editEmail"]) && $_POST["editPsw"]) {
        $editEmail = $_POST["editEmail"];
        $editPsw = $_POST["editPsw"];
        $_SESSION["editEmail"] = $editEmail;
        $_SESSION["editPsw"] = $editPsw;
    }

    if(isset($_POST['uEmail']) && isset($_POST['uPsw'])){
        $newEmail = $_POST['uEmail'];
        $newPsw = $_POST['uPsw'];
        
        //check to see if any field is empty
        if(empty($newEmail) || empty($newPsw)){
            $message = "Please enter a valid email and password";
        }
        else{
            if(!isset($message)){
                $xml = simplexml_load_file('../Store/User/users.xml');
                foreach($xml->user as $user){
                    if($user->email == $_SESSION["editEmail"] && $user->password == $_SESSION["editPsw"]){
                        $user->email = $newEmail;
                        $user->password = md5(sha1($newPsw));
                        $xml->asXML('../Store/User/users.xml');
                        $message = "The user has been edited successfully!";
                        break;
                    }
                }
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
            <a class="navbtn" href="./orderlist.php">Order List</a>
            <a class="navbtn" href="#"><?= $_SESSION['email'] ?></a>
        </nav>
    </header>
    <main>
        <div class="pageContainer">
        
            <div class="editorContainer">
                <h1 style="align-self: center;">Edit User Profile</h1>
                <div class="editArea">
                    <form method = "POST">
                        <p>User Email:</p>
                        <input class="editFields" name="uEmail" type="text" placeholder="Edit User Email"<?php if(isset($editEmail)) {print "value=\"$editEmail\"";} ?>>
                        <p>Password:</p>
                        <input class="editFields" name="uPsw" type="text" placeholder="Enter a New password">
                        <input type="hidden" name="add" value="edit">
                        <input type="submit" class="btn" value="Save" style="float: right; margin-top: 20px;">
                    </form> 
                    <?php
                        if(isset($message)) {
                            print $message;
                        }
                    ?>

                </div>
            </div>
            

        </div>
    </main>
</body>
<footer>

    <span>Made By Tanzir Hoque & Nicholas Piperni</span>
    <a class = "btn" href="/index.php">Go Back</a>

</footer>

</html>