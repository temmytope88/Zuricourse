<?php
 session_start(); 
if($_POST)
        {
                    $email = "";
                
                if (empty ($_POST["email"]))
                  {
                    $_SESSION["error"] = "Enter your Email";
                    header("location:forgotpw.php");
                  }
                else
                  {
                    $email = $_POST["email"];
                    try 
                        {
                          include("Config/connect.php");
                          $query = "SELECT email FROM usertable WHERE email = '$email'";
                          $stmt = $conn->prepare($query);
                          $stmt->execute();
                          $result = $stmt->fetch(PDO::FETCH_ASSOC);
                          if($result)
                                    {
                                     
                                              $alpha = "1234567890abcdefghijlkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
                                              
                                              $token = substr(str_shuffle($alpha), 0, 40);
                                              
                                                                     
                                              // print_r($token);
                                              $to =  $email;
                                              $subject = "RESET PASSWORD";
                                              $message = "A password change was authorized for this Email, kindly ignore if u did not authorize it. Otherwise, click on the link localhost/MyBlog/pwreset.php?token=".$token;
                                              $header = "from:wenmaster@SM.org";
                
                                             
                                              $try = mail($to, $subject, $message, $header);
                      
                                              if ($try){
                                                            $sql = "INSERT INTO token (email, token) VALUES (:email, :token)";
                                                            $stmt = $conn->prepare($sql);
                                                            $stmt->bindParam(':email', $email);
                                                            $stmt->bindParam(':token', $token);
                                                            $stmt->execute();
                                              
                                                            $_SESSION["success"]="Password reset successful, check your inbox";
                                                            header("location:forgotpw.php");
                                                      }
                                              else{
                                                $_SESSION["error"]= "Password reset not successful, please try again";
                                                header("location:forgotpw.php");
                                              }
                                   }
                          
                           else
                              {
                                  $_SESSION["error"] = "Email does not exist, please enter a valid email";
                                  header("location:forgotpw.php");
                              }
                        }
                      catch(PDOException $e)
                            {
                              die('ERROR: '.$e->getMessage());
                            }    
                  }
        }