<?php
include 'sqlconnect.php';
include 'functions.php';
 ?>


<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>dd</title>
  </head>
  <body>
  <form class="login" action= <?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> method="post">

    <label for="type">Log in as:- </label>
    <input type="radio" name="type" value="server"> Server
    <input type="radio" name="type" value="operator"> Operator
    <input type="radio" name="type" value="student" checked> Student <br>
    <label for="username"> Username</label>
    <input type="text" name="username" value=""><br><br>
    <label for="password"> Password </label>
    <input type="password" name="password" value=""><br><br>
    <input type="submit" name="submit" value="Log In">
    <input type="hidden" name="userset" value="userset">

  </form>
  <?php
// if(isset($_SESSION))
// echo $_SESSION['passincorrect'];
// if(isset($_SESSION))
// {
//   echo '123';
//   session_destroy();
//
// }
// session_start();
  if(isset($_POST['userset']))
  {
    process_username();
    unset($_POST['userset']);
  }

  function process_username(){
    global $conn;
    $name = test_in($_POST['username']);
    $pwd = test_in($_POST['password']);
    $type = test_in($_POST['type']);
    $query = "SELECT password, type FROM financedb.login WHERE name = ?";
    if($stmt = mysqli_prepare($conn, $query))
    {
      mysqli_stmt_bind_param($stmt, 's', $name);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_bind_result($stmt, $hash, $ty);
      mysqli_stmt_fetch($stmt);
      mysqli_stmt_store_result($stmt);

    }

    if(password_verify($pwd, $hash) && $ty == $type)
    {
  $url  = "welcome".$ty;
  $_SESSION['user'] = $name;

  redirect($url);
    }
    else {
      // $_SESSION['passincorrect'] = "123Invalid Username or Password";
      echo "Invalid Username or Password or type mismatch";
      //redirect("login.php");
    }

  }

   ?>
  </body>
</html>
