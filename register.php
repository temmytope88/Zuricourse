<?php session_start();
    include("sessions/errorsession.php");

    if(isset($_SESSION["id"]) && isset($_SESSION["name"])) 
        {
            header("location:dashboard.php");
            
        }
    else
       {
         include("add/registrationform.php");
       }
    
    
?>
