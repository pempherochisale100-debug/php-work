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
        <h1><i class="fas fa-hospital"></i> ZAKUTHA TOBACCO ESTATE</h1>
        <h2>KULEMBA WANTCHITO WATSOPANO</h2>

        <div class="form-card">
            <label>Dzina logwitsa ntchito</lable><br>
<input type="text" name="username" placeholder="lowetsani dzina logwiritsa ntchito">

<label>Dzina la ogwira ntchito</lable><br>
<input type="text" name="first_name" placeholder="lowetsani dzina loyamba">

<label>Dzina la bambo </lable><br>
<input type="text" name="last_name" placeholder="lowetsani dzina la bambo">

<label>Gulu la ogwira ntchito</lable><br>
  <select
         style="     width:100%; padding:12px;
      border-radius:20px;
       border:1px solid #dce5ef; 
       margin-top:6px;"
  name="category">
       <option>TICKET</option>
       <option>WACHIBALE</option>
       <option>GANYU</option>
       <option>WOKHAZIKIKA</option>
  </select>

<label>Tsiku lolembedwa ntchito</lable><br>
<input type="text" name="date_of_birth" placeholder="lowetsani tsiku ngati 'yyyy/mm/dd'">
<label>Mfumu yaikulu nd mudzi</lable><br>
<textarea name="address"></textarea>
<label>Mwamuna/mkazi</label> <br>
<select
       style="     width:100%; padding:12px;
      border-radius:20px;
       border:1px solid #dce5ef; 
       margin-top:6px;"
   name="gender">

    <option>MWAMUNA</option>
    <option>MKAZI</option>
</select>

<label>Lamya/ telefoni</label><br>
<input type="text" name="phone_number" placeholder="lowetsani nambala ya foni ya ogwira ntchito">

<label>Namabala yachinsisi </label><br>
<input type="password" name="password" placeholder="lowetsani nambala ya chinsisi ya ogwira ntchito">

<label>Tsimikizani nambala ya chinsisi </label><br>
<input type="password" name="confirm_password" placeholder="tsimikizani nambala ya chinsisi ya ogwira ntchito">

<label>Email </label><br>
<input type="email" name="email" placeholder="lowetsani email ya ogwira ntchito">

<label>Udindo</lable><br>
   <select
       style="     width:100%; padding:12px;
      border-radius:20px;
       border:1px solid #dce5ef; 
       margin-top:6px;"
   name="user_role">
       
       <option>OGWIRA NTCHITO </option>
       
   </select>



<label>Nambala ya chiphanso</lable><br>
<input type="integer" name="id_number" placeholder="lowetsani nambala ya chiphanso ya ogwira ntchito">


            <input
         style="width:50%; padding:12px;
      border-radius:20px;
       border:1px solid #dce5ef;
       background-color:green;
       margin-left:25%; 
       margin-top:6px;"
          type="submit" name="submitbutton" value="LOWETSANI PANO"/>
            <div class="warning">⚠️ Onetsetsani kuti zonse mwapeleka pano ndizolondola chifukwa zidzakhala pa ID yanu</div>
            
        </div>
        </form>
    </div>
</body>
</html>


<?php

include ("connection.php");

        if (isset ($_POST['submitbutton'])){
               $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
               $first_name = filter_input(INPUT_POST, "first_name", FILTER_SANITIZE_SPECIAL_CHARS);
               $last_name = filter_input(INPUT_POST, "last_name", FILTER_SANITIZE_SPECIAL_CHARS);
               $category = $_POST ['category'];
              $date = $_POST ['date_of_birth'];
              $gender = $_POST ['gender'];

              $phone = filter_input(INPUT_POST, "phone_number", FILTER_SANITIZE_NUMBER_INT);
                  if (strlen ($phone) < 10 && strlen ($phone > 10)){
                      echo "valid phone number has 10 numbers <br>";
                  }
                  
               $address = $_POST ['address'];
               
              
             
              $password = $_POST ['password'];
              $main_hash = password_hash ($password, PASSWORD_DEFAULT);

              $confirm_password = $_POST ['confirm_password'];
              $hash = password_hash ($confirm_password, PASSWORD_DEFAULT);

              $hash = null;
              try {
                    if ($main_hash != $hash){
                        echo "Failed to register";
                    }
                  }
                 catch (mysqli_sql_exception){
                   echo "passwords do  not much";
                  }

 
               $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
                $user_role = $_POST['user_role'];
                $id_number = $_POST ["id_number"];//filter_input(INPUT_POST, "id_number", FILTER_SANITIZE_NUMBER_INT);
                
                if (empty($username)){
                    echo "username is required";
                }
                
                elseif (empty($first_name)) {
                       echo "first name cannot be empty";
                  }
                  elseif (empty($last_name)){
                    echo "last name field can not be empty";
                  }
                  

                  elseif (empty ($date)){
                    echo "date is suppossed to appear";
                  }
                  elseif (empty($phone)){
                    echo "phone number is essential for communication, is supposed to be there";
                  }
                  elseif (empty($address)){
                      echo "physical location needed";
                  }
                  elseif (empty($id_number)){
                     echo "id_number is the most important of all";
                  }
                  elseif (empty ($user_role)){
                    echo "you will be classified according to your user roles in this system";
                  }
             
               // $hash = "1234";

    include ("connection.php");

          $query = "INSERT INTO `users`
                    (`user_id`, `username`, `first_name`, `last_name`,
                    `category`, `date_of_birth`, `address`, `gender`, `password`,
                    `confirm_password`, `email`, `phone`, `user_role`, `id_number`)
                     VALUES
                      (NULL, '$username', '$first_name','$last_name','$category','$date',
                      '$address','$gender',
                      '$main_hash','$hash','$email','$phone','$user_role','$id_number')";

                    try {
                        
            $run_this_query = mysqli_query ($connection, $query);

                if ($run_this_query) {
                       echo "worker has been registered successfully ";
                        header ("location: workers.php");
                }
                else { 
                    echo " failed to register then worker";
                    header ("location: worker_registration.php");
                }
                    }
                    catch(mysqli_sql_exception){
                        echo "failed to register";

                    }
               

               
                     
        }


?>