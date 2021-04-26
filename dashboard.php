<?php
      session_start();
      include("sessions/errorsession.php");
      if(isset($_SESSION["id"]) && isset($_SESSION["name"]))
      {
         include("add/header.php");
         include("add/nav.php");
         echo "<div style='color:green'>Welcome ".$_SESSION["name"]."</div>";
         echo "<div><img src='images/dash.jpeg' class='img-fluid w-100'></div>";
         include("add/footer.php");
      }

      else
      {
        header("location:index.php");
      }
?>

  

