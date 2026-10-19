

<?php
    include ("connection.php");
          $initial_username = null;
          $current1 = null;
          $current2 = null;
          //$selection = null;
        

       if (isset ($_POST ["btn"])){
           //if (empty($_POST ["username"])){
               $initial_username = filter_input (INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
           //}
           
              // echo "initial username is required for this operation <br>";
           
           
               $current1 = filter_input (INPUT_POST, "username1", FILTER_SANITIZE_SPECIAL_CHARS);
           
          // else {
             //  echo "new password is required to finish this <br>";
          // }
           //if (empty ($_POST ["username2"])){
               $current2 = filter_input (INPUT_POST, "username2", FILTER_SANITIZE_SPECIAL_CHARS);
           //}
           //else {
              // echo "fill this spot too!!!! <br>";
          // }
          if (empty ($initial_username) && empty ($current1) && empty ($current2) && $current1 != $current2 ){
             echo "process failed try again <br>";
          }
          else{
            $run = null;
try {
    
        $selection = "SELECT * FROM `users` ";
        $run = mysqli_query ($connection, $selection);
        
        $update = "UPDATE `users` SET `username` = '$current1' WHERE `users`.`user_id` = 1";
        $execute = mysqli_query ($connection, $update);
           if ($execute){
               header ("location : zakutha_profile.php");
           }
           else{
               echo "failed to change the username <br>";
           }
        
}
catch (mysqli_sql_exception){
    echo "server connection lost";
}
           //if (mysqli_num_rows ($run) > 0){

              // while ($result = mysqli_fetch_assoc ($run)){

                // if ($result ['username'] == $initial_username && $current1 == $current2 ){


               //  }

              // }

          //}
        
        }

    

       }
        



?>
