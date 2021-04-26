<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="css/bootstrap.min.css">  
  <link rel="stylesheet" href="css/style.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
   <?php
        if(isset($_GET["Id"])){
          try{
                 $id = $_GET["Id"];
        
                  
                 include("Config/connect.php");
                  $query = "SELECT coursetitle, coursecontent, user FROM coursetable WHERE courseId = ? LIMIT 0,1";
                  $stmt = $conn->prepare($query);
                  $stmt->bindParam(1, $id);
                  $stmt->execute();
                  $row = $stmt->fetch(PDO::FETCH_ASSOC);
                  $title = $row["coursetitle"];
                  $body = $row["coursecontent"];
                  $user = $row["user"];

                  echo"<div class='container'>
                  <div class='header'>
                  <nav class='navbar navbar-light bg-light'>
                      <div class='navbar-brand'>
                          <h2>COURSES</h2>
                      </div>
                  </nav>
                  </div>
                    <table class='table '>
                    <tr class='thead-dark'>
                    <th><h3>My COURSES</h3></th>
                    </tr></table>
                       <h3>Title: {$title}</h3>
                       <hr>
                       <p>{$body}</p>
                       <p>Author: {$user}</p>
                       <hr>
                       <button class='btn btn-danger'><a style='color:white' href='dashboard.php'>Back</a></button>
                  </div>";
                  
                 
            }
        catch(PDOExcetion $e){
             die('ERROR: '.$e->getMessage());
            }
        }

        else{
          die("ERROR: ID NOT FOUND");
        };
      
   ?>
</body>
</html>