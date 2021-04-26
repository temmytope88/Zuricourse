<?php

        if(isset($_GET["Id"])){
          try{
                 $id = $_GET["Id"];
        
                  
                 include("Config/connect.php");
                  $query =  "DELETE FROM coursetable WHERE courseId = $id";
                  $stmt = $conn->prepare($query);
                  
                  $stmt->execute();

                  $_SESSION["success"] = "Post deleted";
                  header("Location:personalposts.php");
            }
        catch(PDOExcetion $e){
             die(
              $_SESSION["error"] ='ERROR: '.$e->getMessage());
              header("Location:personalposts.php");
            }   
        }

        else{
          $_SESSION["error"] = "ERROR: Id not found";
          header("Location:personalposts.php");
        };
