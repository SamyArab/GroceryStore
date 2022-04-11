<?php
session_start();

if(isset($_POST['submit'])){
    $errors = [];

    if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['psw']) && !empty($_POST['psw'])){
        $xml = @simplexml_load_file('users.xml');

        $success = false;
        foreach($xml->user as $user){
            if($user->email == $_POST['email']){
                if($user->password == md5(sha1($_POST['psw']))){
                    $_SESSION['email'] = $_POST['email'];
                    $_SESSION['is_admin'] = $user->isadmin;

                    header('Location: /');
                }

                break;
            }
        }

        if(!$success){
            $errors[] = 'Wrong email / password';
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
<link rel="StyleSheet" href="/CSS/Pg5CSS.css">

<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<form method="POST">
  <h3>Login Page</h3>
  <span class="home"><a href="/index.html"> Home </a></span>

  <div class="container">

  <?php
  if(isset($errors)){
    foreach($errors as $error){
      echo '- '.$error."<br/>";
    }
  }
  ?>
    <label for="Email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <button type="submit" name="submit" value="true">Login</button>

    <label><input type="checkbox" checked="checked" name="remember"> Remember me </label>
    
    <div class="box">
      <span class="psw"><a href="#">Forgot password?</a></span>
      <span class="noAcc"><a href="Pg6SignUp.php"> Don't have an account? </a></span>
    </div>
    
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
