<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>zakutha tobacco estate</title>
    <link rel="stylesheet" href="hostel-dashboard.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="dashboard">
        <h1>🏠ZAKUTHA TOBACCO ESTATE</h1>
        <h2>DASHBOARD</h2>

        <div class="stats-grid">
            
            <div class="card">
                <div class="number">1  👨‍💼</div>
                <div class="label">
                    <form method="post" action="<?php htmlspecialchars ($_SERVER ["PHP_SELF"]);    ?>">
                        <input type="submit" name="submit" value="PROFILE">
                    </form>
                        <?php
                            include ("connection.php");
                               if (isset ($_POST ["submit"])){
                                  header ("location:zakutha_profile.php");
                               }
                        ?>
                </div>
            </div>
            <div class="card"><div class="number">2  💰</div><div class="label"><a href="income.php">INCOME</a></div></div>
            <div class="card"><div class="number">3  💸</div><div class="label"><a href="expenses.php">EXPENSES</a></div></div>

            <div class="card"><div class="number">4  🌱</div><div class="label"><a href="crops.php">CROPS</a></div></div>
            <div class="card"><div class="number">5  👯‍♂️👯‍♀️</div><div class="label"><a href="workers.php">WORKERS</a></div></div>
            <div class="card"><div class="number">6  🏪</div><div class="label"><a href="stores.php">STORES</a></div></div>
             <div class="card"><div class="number">7  📈</div><div class="label"><a href="zakutha_reports.php">REPORTS</a></div></div>
            
        </div>

        <div class="account">📁 Account</div>
    </div>
</body>
</html>