<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
    
   <?php
        
       if(isset($_GET["Id"]) &&  isset($_POST["body"]) && isset($_POST["title"]) && isset($_SESSION["name"])){
                     
                         include("Config/connect.php");

                      try{
                              $id = $_GET["Id"];
                              $title = $_POST["title"];
                              $body = $_POST["body"];
                              $date = date("Y-m-d H:i:s");
                              
                              $query = " UPDATE coursetable  SET coursetitle='$title', coursecontent='$body', timecreated='$date' WHERE courseid = $id" ;
                              $stmt = $conn->prepare($query);

                              if($stmt->execute()){
                                  echo"<div class='container'>
                                  <div class='alert alert-success'>Record Saved</div>";
                                  echo"<button class= 'btn btn-danger'><a href='personalposts.php' style='color:white'>Back</a></button>";
                                  echo"</div>";
                              }
                              else{
                                  echo"<div class='container'>
                                  <div class='alert alert-danger'>Record Not Saved</div>";
                                  echo"<button class= 'btn btn-danger'><a href='personalposts.php' style='color:white'>Back</a></button>";
                                  echo"</div>";
                              }
                      }
                      catch(PDOException $e){
                          echo"fail<br>";
                          die('ERROR: '.$e->getMessage());

                      }
      }
     
      else if(isset($_GET["Id"])){
                    try{
                          $id = $_GET["Id"];

                          include("Config/connect.php");
                            $query = "SELECT coursetitle, coursecontent FROM coursetable WHERE courseid = ? LIMIT 0,1";
                            $stmt = $conn->prepare($query);
                            $stmt->bindParam(1, $id);
                            $stmt->execute();
                            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                            $title = $row["coursetitle"];
                            $body = $row["coursecontent"];
                            echo "<div class='container'>";
                                echo"<h1>UPDATE POST</h1>";
                                echo"<form action={$_SERVER["PHP_SELF"]}?Id={$id} method = 'post'>";
                                  echo"<p class='form-group'>";
                                    echo"<label>Title</label><br>";
                                    echo"<input type='text' name='title' class='form-control' Value='{$title}'>";
                                  echo "</p>";
                                  echo"<p class='form-group'>";
                                    echo"<label>Body</label><br>";
                                    echo"<textarea name='body' class='form-control'>{$body}</textarea>";
                                  echo"</p>";
                                  echo"<p class='form-group'>";
                                    echo "<button class='btn btn-primary'>Update</button>";
                                    echo "<button class='btn btn-danger'style='margin-left:30px'><a href='Viewposts.php' style='color:white; margin-left'>Back</a></button>";
                                  echo"</p>";
                                echo"</form>";
                            echo "</div>";
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