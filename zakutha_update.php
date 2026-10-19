<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>zakutha tobacco estate update-profile</title>
    <link rel="stylesheet" href="update_profile.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Document</title>
</head>
<body>
    <div class="main">
        <form method="post" action="">
             <div class="update-section">
            <h3><strong>UPDATE PROFILE PICTURE</strong></h3>
            <input type="file" name="upload_picture" value="choose a profile picture"><br>

            <input style="background-color: green;" type="submit" name="button" value="UPDATE PROFILE PICTURE"/>
             </div>
        <div class="update-section">
<form method="post" action="update_username.php">
                <h3>CHANGE USERNAME </h3>
            <label for="username">Current username</label><br>
           <input type="text" name="username" placeholder="enter your current username"/><br>
           <label for="username">New username</label><br>
           <input type="text" name="username1" placeholder="enter your new username"/><br>
           <label for="username">New username</label><br>
           <input type="text" name="username2" placeholder="confirm your ne username"/><br>

            <input style="background-color: green;" type="submit" name="btn" value="CHANGE USERNAME"/>
</form>
        </div>
        <div class="update-section">
<form method="post" action="update_password.php">
                <h3>CHANGE PASSWORD </h3>
            <label for="password">Current password</label><br>
           <input type="secret" name="current_password" placeholder="enter your current password"/><br>
           <label for="password">New password</label><br>
           <input type="secret" name="new_password1" placeholder="enter your new password"/><br>
           <label for="password">Confirm new username</label><br>
           <input type="secret" name="new_password" placeholder="confirm your new password"/><br>

            <input style="background-color: green;" type="submit" name="button1" value="CHANGE PASSWORD"/>
</form>
        </div>
        </form>
    </div>
</body>
</html>