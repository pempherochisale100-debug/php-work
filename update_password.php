<?php

     include ("connection.php");

         if (isset ($_POST ["button1"])){
               $password1 = filter_input (INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
               $new_password1 = filter_input (INPUT_POST, "new_password1", FILTER_SANITIZE_SPECIAL_CHARS);
               $new_password = filter_input (INPUT_POST, "new_password", FILTER_SANITIZE_SPECIAL_CHARS);
                  
                  if (empty ($password1) && empty ($new_password1) && empty ($new_password)){
                      echo "both fields needs to be filled in <br>";
                  }
                     else {
                          $run = null;
                          try {
                               $sql = "SELECT * FROM `users` WHERE  `user_id` = 1";
                               $run  = mysqli_query ($connection, $sql);
                          }
                          catch (mysqli_sql_exception){
                               echo "connection to the database was not successful <br>";
                          }

                              if (mysqli_num_rows ($run) > 0){

                                   while ($row = mysqli_fetch_assoc ($run)){

                                     if (password_verify ($password1, $row ['password']) && $new_password1 == $new_password){

                                         $update = "UPDATE `users` SET `password` = '$password1'";
                                         $execute = mysqli_query ($connection, $update);
                                            if ($execute == true){
                                                 echo "Password has been updated successfully <br> ";
                                            }
                                            else {
                                                echo " A problem occured please try later <br> ";
                                            }
                                            
                                     }

                                   }

                              }

                     }

         }




?>