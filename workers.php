<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>zakutha tobacco estate workers list</title>
    <link rel="stylesheet" href="workers.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="app">
        <aside class="sidebar">
            <h3>ZAKUTHA TOBACCO ESTATE</h3>
            <ul>
                <li><i class="fas fa-tachometer-alt"></i> <a href="dashboard.php">DASHBOARD</a></li>
                <li><i class="fas fa-user-plus"></i><a href="worker_profile.php">WORKER PROFILE</a></li>
                <li><i class="fas fa-id-card"></i> <a href="worker_registration.php">WORKER REGISTRATION</a></li>
                <li><i class="fas fa-user-circle"></i> <a href="work_progress.php">WORK PROGRESS</a></li>
            </ul>
            
        </aside>
        <main>
            <div class="toolbar">

<h2>WORKER'S LIST</h2>
                <input type="text" placeholder="Search by name, category, or phone number...">
            </div>
            <table>
            <thead>
                <tr>
                    <th> ID</th>
                    <th> FIRST NAME</th>
                    <th> LAST NAME</th>
                    <th>CATEGORY</th>
                    <th>PHONE NUMBER</th>
                    <th>REGISTERED ON</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
                <tbody>
                    <tr>
                        
                <?php
                  include ("connection.php");
                  
                         $selection = "SELECT * FROM `users`";# WHERE category = 'PERMANENT WORKER'

                             $run_this = mysqli_query ($connection, $selection);

                               if (mysqli_num_rows($run_this) > 0){
                                   while ($row = mysqli_fetch_assoc($run_this)){

                           ?>
                        <td><?php 
                             echo $row['user_id'];
                        ?></td>
                        <td> <a href="worker_profile.php"> <?php  echo $row ['first_name']; ?> </a> </td>
                        
                         <td> <?php echo $row ['last_name'];?></td>

                        <td><?php echo $row ['category']; ?></td>
                        <td><?php  echo $row ['phone']; ?></td>
                        <td><?php  echo $row ['date_of_birth'];   ?></td>

                        <td><button class="edit-btn">Edit</button>  <button class="edit-btn">Delete</button></td>
                    </tr>


                   <?php } } ?>


                </tbody>
            </table>
            <div class="last-updated">Last updated: Jul 24, 2025 - 21:40</div>
        </main>
    </div>
</body>
</html>


