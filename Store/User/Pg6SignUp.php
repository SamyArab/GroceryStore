<?php

if(isset($_POST['submit'])){
    $errors = [];

    if(!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors[] = 'Please enter a valid email';
    }

    if(!isset($_POST['psw']) || empty($_POST['psw'])){
        $errors[] = 'Please enter a password';
    }
    else if(!isset($_POST['verify']) || empty($_POST['verify']) || $_POST['verify'] != $_POST['psw']){
        $errors[] = 'Please make sure the passwords match';
    }

    if(empty($errors)){

        $xml = simplexml_load_file('users.xml');

        if(!isset($xml)){
            $xml = '<?xml version="1.0" encoding="UTF-8" ?><users></users>';

            $xml = simplexml_load_string($xml);
        }

        foreach($xml->user as $user){
            if($user->email == $_POST['email']){
                $errors[] = 'An account with this email address already exists';
                break;
            }
        }
    

        if(empty($errors)){

            $user = $xml->addChild('user');
            $user->addChild('email', $_POST['email']);
            $user->addChild('password', md5(sha1($_POST['psw'])));
            $user->addChild('isadmin', false);
            
            $info = array();
            
            $user->addChild('shoppingCart', json_encode($info, 0, 512));
            
            

            file_put_contents('users.xml', $xml->asXML());

        }

    }
}
?>


<!DOCTYPE html>
<html>

<head>
<link rel="StyleSheet" href="/CSS/Pg6CSS.css">

<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<form method="POST">
  <h3>Sign Up Page</h3>
  <span class="home"><a href="/index.php"> Home </a></span>

  <div class="container">

    <?php
    if(isset($errors)){
      if(!empty($errors)){
        foreach($errors as $error){
          echo '- '.$error."<br/>";
        }
      }
      else{
        echo "Account registered, you may now <a href='Pg5LogIn.php'>log in</a><br/>";
      }
    }
    ?>

    <label for="Email"><b>Enter Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Choose Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
    <label for="psw"><b>Verify Password</b></label>
    <input type="password" placeholder="Re-Enter Password" name="verify" required>
        
    <button type="submit" name="submit" value="true">Create Account</button>

    <span class="login"><a href="Pg5LogIn.php"> Already have an account? </a></span>
    
    <p><button type="button" class="cancelbtn">Reset</button></p>
  </div>
</form>

</body>

<footer class="footer">
  <div class="footer--container">
      <h5>This page was made by: Victor Pereira</h5>
  </div>
</footer>

</html>
