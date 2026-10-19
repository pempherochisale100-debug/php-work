 <?php
     include ("learn.php");
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <label >username:</label>
    <input type="text" name="username" ><br>
    <label>password:</label>
    <input type="password" name="password" ><br>
    <input type="submit" name="submit" value="register"><br>
</body>
</html>

<?php
     include ("learn.php");

     if (isset($_POST['submit'])){
        $username = $_POST ['username'];
        $password = $_POST ['password'];

             $sql = "INSERT INTO `users` (user, passwords) values ('$username', '$password')";

                $run = mysqli_query ($conn, $sql);
                    
                if ($run){
                    echo "registered";
                }
                else {
                    echo "failed to register";
                }
     }
     
  /*   
if (isset ($_POST['submit'])){
   // $sql = 0;
    if (empty($_POST['username']) && empty($_POST['password'])){
        echo "username or rpassword is missing";
    }
    else {
         $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
         $password = filter_input (INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
         $hash = password_hash($password, PASSWORD_DEFAULT);
       $sql = "insert into users 
       (user, passwords) values ('$username','$hash')";

        $run = mysqli_query ($conn, $sql);

             if ($run) {
                echo "<br> userv has been regitred" ;
             }
             else {
                echo "failed to connect";
             }
    }     
try{
    $run = mysqli_query ($conn, $sql);
        echo "<br> user is registered <br>";
}
catch (mysqli_sql_exception){
    echo "<br> could not register <br>";
}
    */

 

 ?>
 <?php
   
      include ("learn.php");
        $sql = "SELECT * from users" ;
            $run = mysqli_query($conn, $sql);

                if (mysqli_num_rows($run) > 0) {
                
                
                while ($row = mysqli_fetch_assoc($run)){
                        echo "id :  {$row['id']} <br>";
                        echo "username : {$row['user']} <br>";
                        echo "password : {$row['passwords']} <br>";
                }
                 
                }



?>