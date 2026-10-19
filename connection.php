<?php 

    $database_server = "localhost";
    $database_user = "root";
    $database_password = "";
    $database_name = "dad";

       //$connection = null;
    try {
                 $connection = mysqli_connect ($database_server,  $database_user, $database_password, $database_name);
    }
        catch (mysqli_sql_exception){
               echo "failed to connnect <br>";
        }
/*
              if ($connection) {
                  echo "database connection has been successful";
              }
              else {
               echo "failed to connect";

              }

*/

?>