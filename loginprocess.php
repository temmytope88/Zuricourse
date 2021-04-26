<?php
  session_start();
  include("Config/connect.php");

  $count = 0;
  $password = $email = "";
  

  $_POST["email"] = ""? $count++ : $email = $_POST["email"];
  $_POST["password"] = ""? $count++ : $password = $_POST["password"];

  if($count>0)
  {
    $_SESSION["error"] ="Complete the required field";
  }
  else
  {
        $query = "SELECT email, passcode, firstname, surname, Id FROM usertable WHERE email = '$email' ";
        //$stmt = $conn->prepare($query);
        $stmt = $conn->query($query);
      // $result = $stmt->fetch(PDO::FETCH_ASSOC);
         $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result)
        {
          
              if(password_verify($password, $result["passcode"]))
              {
                $_SESSION["name"] = $result["surname"]."  ".$result["firstname"];
                $_SESSION["id"] = $result["Id"];
                $_SESSION["email"] =$result["email"];
              
                header("location:dashboard.php");
              }
              else
              {
                  $_SESSION["error"]= "Incorrect password ";
                  header("location:login.php");
              }
          
        }
        else
        {
          $_SESSION["error"]= "Invalid Email ";
          header("location:login.php");
        }
  }

