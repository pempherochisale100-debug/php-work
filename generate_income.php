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
        <h1><i class="fas fa-hospitall"></i> ZAKUTHA TOBACCO ESTATE</h1>
        <h2>KULEMBA NDALAMA ZOBWERA 💵</h2>

        <div class="form-card">
            <label>Ndinu ndani❔</label>
                 <?php
                     include ("connection.php");
                         $querying_database = "SELECT * FROM `users` WHERE `category` = 'MANAGER'";
                         $running = mysqli_query ($connection, $querying_database);
                            if (mysqli_num_rows ($running) > 0 ) {
                                  while ($row = mysqli_fetch_assoc ($running)){


                                  ?>
                                
                        
                 
            <select>
                <option>
                    <?php  
                        echo "{$row ['user_id']} {$row ['first_name']} {$row['last_name']}";
                    ?>
                </option>
            </select>
            <?php
                    }
                }
            ?>
            <label>Tsiku 📆</lable><br>
<input type="text" name="date" placeholder="lowetsani tsiku ngati 'yyyy/mm/dd' "> <br>

<label>Mwapeza zingati❔</lable><br>
<input type="text" name="amount" placeholder="lowetsani ndalama zomwe mwapeza ">

<label>Mwazipeza bwanji❓ </lable><br>
<input type="text" name="source" placeholder="Fotokonzani mmene mwazipezera" min="5">


            <input
         style="width:50%; padding:12px;
      border-radius:20px;
       border:1px solid #dce5ef;
       background-color:green;
       margin-left:25%; 
       margin-top:6px;"
          type="submit" name="submitbutton" value="ONJEZERANI NDALAMA"/>
           <!-- <div class="warning">⚠️ Onetsetsani kuti zonse mwapeleka pano ndizolondola chifukwa zidzakhala pa ID yanu</div>-->
            
        </div>
        </form>
    </div>
</body>
</html>