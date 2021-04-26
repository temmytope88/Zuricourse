<?php 
   session_start(); 
   include("sessions/errorsession.php");  
   if(isset($_SESSION["id"]) && isset($_SESSION["name"]))
   {
      header("location:dashboard.php");
   }
   else
      {
         
            include("add/header.php");
            echo "<div class= 'wrapper'>";
            echo "<div class= 'container'>";
               echo "<h1>Login</h1>";
                        error();
                        success();  
               echo "<form action='loginprocess.php' method='post'>";
                  echo "<p class='form-group'><br>";
                       echo "<label for='email'>Email:</label><br>";
                       echo " <input type='email' name='email' class ='form-control'>";
                        email();
                  echo "</p>" ;

                  echo"<p class='form-group'>";
      
                        echo"<label for='password'>Password:</label><br>";
                        echo"<input type='password' name='password' class ='form-control'>";
                        password();
                  echo"</p>";
                  echo "<p>";
                     echo " <button type='submit' class='btn btn-primary'> SUBMIT</button>";
                     echo "<p><a href= 'forgotpw.php'>Forgot Password?</a></p>";
            echo"</div>";
            echo"</div>";
             include("add/footer.php");  
      }
               

    


          

        
       