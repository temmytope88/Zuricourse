<?php
            session_start();
            include("Config/connect.php");
          
            $count = 0;
            $password = $email = $token = "";
            
            if(empty($_POST["email"]))
            {
              $count++;
            }
            else
               {
                    $email = $_POST["email"];
                    
                    if  (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                          $count++;
                    }
                    else{
                          $_SESSION["email_value"] = $email;
                    }
              }


          if(empty($_POST["password"]))
          {
              $count++;
          }
          else 
          {
              $password = $_POST["password"];
              $hash = password_hash($password, PASSWORD_DEFAULT);

              if(!preg_match ("/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*()+=_'?>.,;:}[}\<|]).{11,26}$/", $password)){
                    $_SESSION["password"]= "Password is weak, it should include at least one uppercase, one lowercase, one number and special characters (!@#$%^&*(?>)<+_=-)";
                    $count++;  
              }
         }            
  
   
        if($count>0)
        {
            $_SESSION["error"] = "Complete the required field";
            header("location:pwreset.php");
        }

        else
        {     
               include("Config/connect.php");

              if(isset($_SESSION["name"]))
              {
                try
                  {
                        $sql = "UPDATE usertable SET passcode = '$hash' WHERE email='$email'";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        if($stmt->execute())
                        {
                          unset($_SESSION["name"]);
                          $_SESSION["success"] = "Password change successful";
                          header("location:login.php");

                        }

                  }
                  catch(PDOException $e)
                    {
                      die('ERROR: '.$e->getMessage());
                    }    
                
              }
             
              elseif(!isset($_SESSION["name"]) && !empty($_POST["token"])){
                    $sql = "SELECT token FROM token where email = '$email'";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    if($result)
                     {
                        $query = "DELETE * FROM token where email = '$email'";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();

                        $sql = "UPDATE usertable SET passcode = '$hash' WHERE email='$email'";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        if($stmt->execute())
                        {
                          unset($_SESSION["name"]);
                          $_SESSION["success"] = "Password change successful";
                          header("location:login.php");

                        }
                     }
              }
              else{
                      $_SESSION["error"] = "Invalid Email or Token, Try again!";
                      header("location:pwreset.php");
              }
        }
  
   
?>