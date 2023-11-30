<?php
    $success=0;
    $user= 0;
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
        include 'connect.php';
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];

        $sql = "select * from `users` where email='$email'";
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)> 0){
            $user=1;
        }
        else{
            $sql = "insert into `users`(name,email,password,address,phone) values ('$name','$email','$password','$address','$phone')";

            $result = mysqli_query($conn,$sql);
    
            if($result){
                $success=1;
            }
            else{
                die(mysqli_error($conn)); 
            }
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
    <div class="register">
        <form action="register.php" method="post">
            <h1 class="heading">Jookebox Assignment</h1>
            <h2 class="text-action">REGISTER</h2>
            <input class="input-elements" type="text" name="name" placeholder="Enter your name">
            <input class="input-elements" type="email" name="email" placeholder="Enter email address">
            <input type="password" class="input-elements" placeholder="Enter password" name="password">
            <textarea name="address" class="input-elements" cols="20" rows="7" placeholder="Enter address"></textarea>
            <input type="text" class="input-elements" placeholder="Enter phone" name="phone">
            <button class="button-action">Register</button>
            <a class="redirect" href="sign.php">Already have an account? Sign in.</a>
        </form>
    </div>
  </body>
  <?php
    if($user==1){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Uh Oh! </strong>This user already exists.  
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
  ?>
   <?php
    if($success==1){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success! </strong>Registered Successfully.  
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
  ?>
</html>