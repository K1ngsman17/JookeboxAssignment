<?php
    $success=0;
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
        include 'connect.php';
        $login_email = $_POST['login-email'];
        $login_password = $_POST['login-password'];

        $sql = "select * from `users` where email='$login_email' and password='$login_password'";
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)> 0){
            $success=1;
        }
        else{
            $success= -1;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jookebox Assignment</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <div class="login">
        <form action="sign.php" method="post">
          <h1 class="heading">Jookebox Assignment</h1>
          <h2 class="text-action">LOGIN</h2>
          <input class="input-elements" type="email" name="login-email" placeholder="Enter email address">
          <input type="password" class="input-elements" placeholder="Enter password" name="login-password">
          <button class="button-action">Login</button>
          <a class="redirect" href="register.php">Don't have an account? Register here.</a>
        </form>
    </div>
  </body>
  <?php
    if($success==1){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success! </strong>Logged in Successfully.  
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    elseif($success==-1){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Uh Oh! </strong>Invalid Credentials.  
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
  ?>
</html>