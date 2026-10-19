<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>zakutha tobacco estate profile info</title>
    <link rel="stylesheet" href="zakutha-profile.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <h1><i class="fas fa-hospital"></i> ZAKUTHA TOBACCO ESTATE</h1>
        <div class="profile-card">
            <h2>WORKER PROFILE INFORMATION</h2><br>

            <?php
   include ("connection.php");

           $sql = "SELECT * FROM `users` WHERE user_id = 1";

               $run = mysqli_query($connection, $sql);
                   if (mysqli_num_rows ($run) > 0) {
                         while ( $row = mysqli_fetch_assoc($run)){

                    


            ?>

           <!--<p><strong>EMMANUEL JOSEPH</strong>, MANAGER</p><br>--> 
            <div class="info-row"><span>FULL NAME:</span> <?php echo " {$row['first_name']}   {$row['last_name']}";   ?></div>
            <div class="info-row"><span>GENDER:</span><?php   echo $row['gender'];    ?></div>
            <div class="info-row"><span>USERNAME:</span> <?php   echo $row['username'];    ?></div>
            <div class="info-row"><span>EMAIL:</span><?php   echo $row['email'];    ?></div>
            <div class="info-row"><span>DATE OF BIRTH:</span> <?php   echo $row['date_of_birth'];    ?></div>
            <div class="info-row"><span>PHONE NUMBER:</span><?php   echo $row['phone'];    ?></div>
            <div class="info-row"><span>CATEGORY :</span><?php   echo $row['category'];    ?></div>
            <div class="info-row"><span>ID NUMBER :</span><?php   echo $row['id_number'];    ?></div>
            <div class="info-row"><span>PASSWORD:</span><?php   echo $row['password'];    ?></div>

<?php                 }    }               ?>

        </div>
        <div class="button"><a href="zakutha-update.html">UPDATE PROFILE</a></div>
       
    </div>
</body>
</html>