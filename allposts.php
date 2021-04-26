<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MY COURSES</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <nav class="navbar navbar-light bg-light ">
                <div class="navbar-brand">
                    <h2>MY COURSE</h2>
                </div>
            </nav>
        </div>
        <?php 
            try{
                  include("Config/connect.php");
                  $query = "SELECT courseId, coursetitle, timecreated, user FROM coursetable ORDER BY courseId ASC";
                  $stmt = $conn->prepare($query);
                  $stmt->execute();
                  $num = $stmt->rowCount();
                  if($num>0){
                                echo "<table class='table table-striped '>";
                                    echo "<tr class='thead-dark'>";
                                       
                                        echo "<th>TITLE</th>";
                                        echo "<th>AUTHOR</th>";
                                        echo "<th>TIME CREATED</th>";
                                        echo "<th>ACTIONS</th>";
                                    echo "</tr>";
                                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                    $Id = $row["courseId"];
                                    $Title = $row["coursetitle"];
                                    $TimeCreated = $row["timecreated"];
                                    $user = $row["user"];
                                    echo "<tr>";
                                        
                                        echo "<td>{$Title}</td>";
                                        echo "<td>{$user}</td>";
                                        echo "<td>{$TimeCreated}</td>";
                                        echo "<td><button class='btn-success'><a style='color:white' href='read.php?Id={$Id}'>READ</a></button>";
                                    echo "</tr>";
                                }
                              echo"</table> <hr>";
                              echo"<button class='btn btn-danger'><a href='index.php' style='color:white'>Back</a></button>";
                  } 
                else{
                  echo"<div>NO DATA AVAILABLE</div>";
                  echo"<button class='btn btn-danger'><a href='index.php' style='color:white'>Back</a></button>";
                }
            }    
            catch(PDOException $e){
              die('ERROR: '.$e->getMessage());

          }
         
        ?>
    </div>
</body>
</html>