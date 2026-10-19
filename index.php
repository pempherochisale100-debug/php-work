

<?php
include ("connection.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start ();

?>

<html>
    <head>
        <title>log in page</title>
        <link rel="stylesheet" href="worker_registration.css">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    </head>

    <body>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" >
            <div class="container">
                <h1 style="text-align:center;"><i class="fas fa-hospital"></i> ZAKUTHA TOBACCO ESTATE</h1>
                <h2 style="text-align:center;">LOG IN </h2>
                    <hr>
                <div class="form-card">

            <label for="username"> Username </label>
            <input type="text" name="username" placeholder="Enter your username " /><br>
            <label for="password">Password </label>
            <input type="password" name="password" placeholder="Enter you password here " /><br>
                 <hr>
            <input
            style="border: solid thick black; background-color : green;"
            type="submit" name="log_in" value="LOG IN" /><br>
                </div>
            </div>
            
        </form>
    </body>
</html>

<?php


// If already logged in, redirect
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

$error = "";

if (isset($_POST['log_in'])) {

 echo "<p style='color:blue;'>DEBUG: Form was submitted!</p>"; 

    // 1. Trim whitespace only (DO NOT sanitize passwords)
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

     echo "<p style='color:blue;'>DEBUG: Username entered: " . htmlspecialchars($username) . "</p>";

    if (empty($username) || empty($password)) {
        $error = "Username or password field needs to be filled";
    } else {
        // 2. Query ONLY the user with this username (Use prepared statements!)
        $sql = "SELECT user_id, username, password FROM users WHERE username = ? LIMIT 1";
        
        if ($stmt = mysqli_prepare($connection, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {

            echo "hashed 1234 => ". password_hash (1234, PASSWORD_DEFAULT) . "<br>";

             echo "<p style='color:blue;'>DEBUG: User found in database.</p>";

                // 3. Verify the password against the HASH in the database
                if (password_verify($password, $row['password'])) {

                 echo "<p style='color:blue;'>DEBUG: User found in database.</p>";

                    // Login success!
                    $_SESSION['user_id']  = $row['user_id'];
                    $_SESSION['username'] = $row['username'];

                    header("Location: dashboard.php");
                    exit();
                } else {
                    $error = "Failed to log in: Incorrect password.";
                    echo "<p style='color:red;'>DEBUG: password_verify() failed.</p>";
                }
            } else {
                $error = "Failed to log in: Username not found.";
            }
            mysqli_stmt_close($stmt);
        } else {
            $error = "Database error: " . mysqli_error($connection);
        }
    }
}
?>