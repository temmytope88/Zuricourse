<?php
             session_start();
             ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CREATE COURSE</title>
</head>
<body>
   <div class="container-lg">
        <div>
           <h1>
               Create Course
           </h1>
        </div>
        <?php
             
            if( ($_POST) && isset($_SESSION["name"])){
                
                    if($_POST["title"] != "" && $_POST["body"] ){
                                 include("Config/connect.php");

                            try{

                                $title = $_POST["title"];
                                $body = $_POST["body"];
                                $user = $_SESSION["email"];
                                $date = date("Y-m-d H:i:s");
                                $id = "2";

                                
                                $query = " INSERT INTO coursetable (coursecontent, coursetitle,  user, timecreated) VALUES ('$body', '$title', '$user', '$date')";
                                $stmt = $conn->prepare($query);

                                
                                if($stmt->execute()){
                                    echo"<div class='alert alert-success'>Successfully Saved</div>";
                                    
                                }
                                else{
                                    echo"<div>Unable to save</div>" ;
                                }
                            }
                            catch(PDOException $e){
                                
                                die('ERROR: '.$e->getMessage());
                            }
                    }
                else{
                     echo"<div class='alert alert-danger'>Required Field not Filled</div>";
                }
            }
            else if($_POST)
               {
                echo"<div class='alert alert-danger'>You are not permitted to create a post. Kindly Login</div>";
               }
           
           
        ?>
        <form action= "<?php echo $_SERVER["PHP_SELF"]?>" method="post">
                <p class="form-group">
                    <label for="Title" >Title</label><br>
                    <input type="text" name="title" id="" placeholder="title" class="form-control">
                </p>
                <p>
                    <label for="">Body</label><br>
                    <textarea name="body" class="form-control" placeholder="Enter Your Message"></textarea>
                </p>
                <p>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button class="btn btn-danger"><a href="index.php" style="color:white">Back</a></button>
                </p>
            </form>      
   </div>

    
</body>
</html>