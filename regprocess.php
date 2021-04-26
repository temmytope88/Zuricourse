<?php
			session_start();
		
      $count = 0;
     
      $firstName = $lastName = $email = $password = $gender = "";

                  $_SESSION["firstname"] = $_SESSION["surname"] =$_SESSION["email"] = $_SESSION["password"] = $_SESSION["gender"] =  "";
                  $hash = "";
			
			function test_input($data) {
				$data = trim($data);
				$data = stripcslashes($data);
				$data = htmlspecialchars ($data);
				return $data;    
			}

                 
            if(empty($_POST["firstname"])){
                  $_SESSION["firstname"] = "First Name is required";
                  $count++;
            }
            else{
                  $firstName = test_input($_POST["firstname"]);
                  
                  if  (!preg_match("/^[A-Z][A-Za-z]*/", $firstName)){
                        
                        $_SESSION["firstname"] = "Invalid First Name";
                        $count++;
                  }
                  else{
                        $_SESSION["firstname_value"] = $firstName;
                  }
            }


            if(empty($_POST["surname"])){
                  $_SESSION["surname"] = "Surname is required";
                  $count++;
            }
            else{
                  $lastName = test_input($_POST["surname"]);

                  if  (!preg_match("/^[A-Z][A-Za-z]*/", $lastName)){
                        $_SESSION["lastname"] = "Invalid surname";
                        $count++;
                  }
                  else{
                        $_SESSION["lastname_value"] = $lastName;
                  }
            }


            if(empty($_POST["email"])){
                  $_SESSION["email"] = "Email is required";
                  $count++;
            }
            else{
                  $email = test_input($_POST["email"]);
                  if  (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                        $_SESSION["email"] = "Invalid Email format";
                        $count++;
                  }
                  else{
                        $_SESSION["email_value"] = $email;
                  }
            }


            if(empty($_POST["password"])){
                  $_SESSION["password"]= "Password is required";
                  $count++;
            }
            else {
                  $password = $_POST["password"];
                  $hash = password_hash($password, PASSWORD_DEFAULT);

                  if(!preg_match ("/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*()+=_'?>.,;:}[}\<|]).{11,26}$/", $password)){
                        $_SESSION["password"]= "Password is weak, it should include at least one uppercase, one lowercase, one number and special characters (!@#$%^&*(?>)<+_=-)";
                        $count++;  
                  }
            }            


            if(empty($_POST["gender"])){
                  $_SESSION["gender"] = "Gender is required";
                  $count++;
            }
            else {
                  $gender = test_input($_POST["gender"]);   
                  $_SESSION["gender_value"] = $gender;              
            }
            
                       

         // check  for any error in the users input
          if ($count > 0){
                header("location:register.php");
          }
          else
             {     
								//echo $password.$hash;
								//echo $password."   ".$hash."    ".password_verify($password, $hash);
								
							  include("Config/connect.php");
                $query = "SELECT email FROM usertable WHERE email = '$email'";
								$stmt = $conn->prepare($query);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if($result)
                        {
                              $_SESSION["error"] = "Email already exists";
                              header("location:login.php");
                        }

                else
                    {
											$sql = "INSERT INTO usertable (firstname, surname, email, passcode, gender) VALUES (:firstname, :surname, :email, :passcode, :gender)";
											$stmt = $conn->prepare($sql);
											
											$stmt->bindParam(':firstname', $firstName);
											$stmt->bindParam(':surname', $lastName);
											$stmt->bindParam(':email', $email);
											$stmt->bindParam(':passcode', $hash);
											$stmt->bindParam(':gender', $gender);

											$stmt->execute();
											$_SESSION["success"] = "Registration Successfully!, you can now login";
											header("location:login.php");
			             }
                
                
            }
        

          
      
?>