<?php    
            session_start();
           include("sessions/errorsession.php");
           include("add/header.php");
            echo "<div class= 'wrapper'>";
            echo "<div class= 'container'>";
               echo "<h1>FORGOT PASSWORD</h1>";
                        error();
                        success();
                     
               echo "<form action='forgotpwprocess.php' method='post'>";
                  echo "<p class='form-group'><br>";
                       echo "<label for='email'>Email:</label><br>";
                       echo " <input type='email' name='email' class ='form-control'>";
                  echo "</p>" ;
                  echo " <button type='submit' class='btn btn-primary'> SUBMIT</button>";
                  echo"<button class='btn btn-danger'style='margin-left:20px'><a href='login.php' style='color:white'>Back</a></button>";
            echo"</div>";
            echo"</div>";
            include("add/footer.php");  
