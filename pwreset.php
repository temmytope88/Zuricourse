<?php
  session_start();
  include("sessions/errorsession.php");
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/bootstrap.min.css"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
</head>
<body>

    <div class="container" >
        <h2>PASSWORD RESET</h2>
        <?php error();?>
        <form action="pwchangeprocess.php" method="post" >
                <p class="form-group">
                   <label for="email">Email:</label><br>
                   <input type="email" name="email" id="" class="form-control"
                      <?php
                        if(isset($_SESSION["name"])){
                          
                          echo (  "readonly value=".$_SESSION['email']);
                          
                        }
                      ?>
                    >
                </p>
                <p class="form-group">
                   <label for="email">New Password:</label><br>
                   <input type="password" name="password" class="form-control" id="">
                   <?php password(); ?>
                </p>
                <?php  
                   if (isset($_GET["token"])){
                     echo("<input type='hidden' name='token' value=".$_GET['token'].">");
                   }
                ?>
                <p>
                   <button type="submit" class="btn btn-primary">Submit</button>
                </p>
               
        </form>
      </div>