<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zakutha tobacco estate </title>
    <link rel="stylesheet" href="worker_registration.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <form method="post" action="">
        <h1><i class="fas fa-hospitalI"></i> ZAKUTHA TOBACCO ESTATE</h1>
        <h2>DONGOSOLO LA GANYU </h2>

           <label>DZINA LA WAGANYU</label><br>
              <select
         style="     width:100%; padding:12px;
      border-radius:20px;
       border:1px solid #dce5ef; 
       margin-top:6px;"
              name="name">
                   <?php

use function PHPSTORM_META\elementType;

                       include ("connection.php");
                          $query = "SELECT * FROM `users` WHERE `category` = 'GANYU' ";
                          $run_this = mysqli_query ($connection, $query);
                      if (mysqli_num_rows ($run_this) > 0) {
                           while ($result = mysqli_fetch_assoc ($run_this)){
                            ?>
                    <option> <?php echo $result ['user_id']." ". $result ['first_name'] ." ". $result ['last_name']."<br>";     ?></option>




                    <?php
                           }
                      }      
                   ?>


              </select><br>

              <label>TIME IN => MAOLA</label><br>
              <input type="text" name="start_hour" placeholder="lowetsani ola lomwe ntchito yayamba"><br>

              <label>TIME IN => MPHINDI</label><br>
              <input type="text" name="start_minute" placeholder="lowetsani mphindi zomwe ntchito yayamba"><br>

              <label>TIME OUT => MAOLA</label><br>
              <input type="text" name="finish_hour" placeholder="lowetsani ola lomwe ntchito yatha"><br>

              <label>TIME OUT => MPHINDI</label><br>
              <input type="text" name="finish_minute" placeholder="lowetsani mphindi zomwe ntchito yatha"><br>

              <label>NTCHITO YOMWE YAGWIRIDWA</label><br>
              <input type="text" name="description" placeholder="lembani ntchito yome yagwiridwa"><br>
              

              <label>MTENGO PA OLA </label>
              <br><input type="text" name="rate" placeholder="lowetsani mtengo pa ola limodzi"><br>

              <label>CHITSIMIKIZO CHA OGWIRA NTCHITO </label>
              <select
             style=" 
      width:100%; padding:12px;
      border-radius:20px;
       border:1px solid #dce5ef; 
       margin-top:6px;"
              name="worker">
                   
                   <option>KUVOMERA</option>
                   <option>KUKANA</option>
                   
              </select>
          <label>CHITSIMIKIZO CHA OLEMBA NTCHITO </label>
              <select
             style=" 
      width:100%; padding:12px;
      border-radius:20px;
       border:1px solid #dce5ef; 
       margin-top:6px;"
              name="employer">
                   
                   <option>KUVOMERA</option>
                   <option>KUKANA</option>
                   
              </select>

            <input
         style="width:50%; padding:12px;
      border-radius:20px;
       border:1px solid #dce5ef;
       background-color:green;
       margin-left:25%; 
       margin-top:6px;"
          type="submit" name="submitbutton" value="DULANI TIKITI PANO"/>

            
        </div>
        </form>
    </div>
</body>
</html>


 <?php
      
      include ("connection.php");
          
         if (isset ($_POST ["submitbutton"])){
              $user_id =    filter_input (INPUT_POST, "name", FILTER_SANITIZE_NUMBER_INT);//filter_input (INPUT_POST, "name", FILTER_VALIDATE_INT);
                 // echo " USER ID =>{$user_id} <br>";
                 // echo $user_id ."<br>";


              $start_hour = filter_input (INPUT_POST, "start_hour", FILTER_SANITIZE_NUMBER_INT);
                    if ( $start_hour > 24 && $start_hour < 0 ){
                           echo "Invalid hours entered <br>";
                    }
                    

              $start_minute = filter_input (INPUT_POST, "start_minute", FILTER_SANITIZE_NUMBER_INT);
                   if ( $start_minute > 60 && $start_minute < 0){
                        echo "Invalid minutes  selected <br>";
                   }
                   

              $finish_hour = filter_input (INPUT_POST, "finish_hour", FILTER_SANITIZE_NUMBER_INT);
                   if ( $finish_hour > 24 && $finish_hour < 0) {
                        echo "Invalid hours entered <br>";
                   }
                   

              $finish_minute = filter_input (INPUT_POST, "finish_minute", FILTER_SANITIZE_NUMBER_INT);
                    if ( $finish_minute > 60 && $finish_minute < 0){
                           echo "Invalid minutes entered <br>";
                    }
                    
              $rate = filter_input (INPUT_POST, "rate", FILTER_SANITIZE_NUMBER_FLOAT);
                         //echo "RATE => {$rate} <br>";
              $description = filter_input (INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS);
                        // echo "DESCRIPTION => {$description} <br>";
              $worker_declaration = filter_input (INPUT_POST, "worker", FILTER_SANITIZE_SPECIAL_CHARS);
                         //echo "WORKER DECLARATION => {$worker_declaration} <br>";
              $employer_declaration = filter_input (INPUT_POST, "employer", FILTER_SANITIZE_SPECIAL_CHARS);
                        // echo " EMPLOYER DECLARATION => {$employer_declaration} <br>";


                 $total_hours = $finish_hour - $start_hour;
                    //echo " TOTAL HOURS WORKING => {$total_hours} <br>";
                 $total_minutes = $finish_minute - $start_minute;
                    //echo " TOTAL MINUTES WORKING => {$total_minutes} <br>";
                 $minutes = null;
                     if ($total_minutes <= 30){
                          $minutes = 0;
                     }
                     else{
                          $minutes = 1;
                     }
                       // echo " ROUNDED NUMBER OF MINUTES => {$minutes} <br>";
                $total_time = $total_hours + $minutes;
                        //echo " TOTAL AMOUNT OF TIME => {$total_time} <br>";
                $total_amount = $total_time * $rate;
                      //  echo "THIS IS TOTAL AMOUNT => {$total_amount} <br>";

                   // if (empty ($user_id)){
                      //    echo "select a user in this operation";
                   // }
                    if (empty ($start_hour)) {
                          echo "Lowetsani ola loyambira ntchito <br>";
                    }
                    elseif (empty ($start_minute)){
                          echo "mphindi zoyambira ntchito zikufunikiranso <br>";
                    }
                    elseif (empty ($finish_hour)){
                          echo "ola lowelukira likufinira ndithu <br>";
                    }
                    elseif (empty ($finish_minute)){
                           echo "mphindi zowelukira zikufunikira ndithu <br>";
                    }
                    elseif(empty ($description)){
                          echo "Lowetsani ntchito yomwe yagwirika <br>";
                    }
                      
                      else {
                      $sql = null;
                         $execute = null;
      try {
    
                         $sql  = "INSERT INTO `time` 
                                 (`ticket_id`, `start_hour`, `start_minute`,
                                 `finish_hour`, `finish_minute`, `date`,
                                 `rate`, `total_time`, `total_amount`,
                                  `user_id`, `description`, `worker_signature`, 
                                  `employer_signature`) 
                                 VALUES
                                  (NULL, '$start_hour', '$start_minute', '$finish_hour',
                                   '$finish_minute', current_timestamp(), '$rate',
                                   '$total_time', '$total_amount', '$user_id', '$description', 
                                   '$worker_declaration', '$employer_declaration')";

                         $execute = mysqli_query ($connection, $sql);
       }
           catch (mysqli_sql_exception){
      echo "An error occured during the operation please try again <br>";
           }
                             if ($execute) {
                                   echo "Mwadula ticket <br>";
                                   header ("location:work_progress.php");
                             }
                             else {
                                echo "Kudula ticket kwakanika <br>";
                             }
                      }
                        
              
         }


         



?>
