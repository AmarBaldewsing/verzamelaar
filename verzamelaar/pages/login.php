<?php
session_start();
 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "verzamelaar";

$alertLink = "<p></p>";
 
$conn = new mysqli($servername, $username, $password, $dbname);
 
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $input_email = $_POST['email'];
    $input_password = $_POST['password'];
 
    $query = "SELECT * FROM login1 WHERE email='$input_email' AND paassword='$input_password'";
    $result = $conn->query($query);
 
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['name'] = $row['name'];
        $_SESSION['id'] = $row['id'];
    
        if ($row['email'] == "admin@admin.nl") {
            $_SESSION['email'] = $row['email'];
            header("Location: admin.php");
        } else if ($row['email'] == $input_email) {
            $_SESSION['email'] = $row['email'];
            header("Location: ../index.php");
        } else {
            $alertLink = "<p>Fout! Check Gebruikersnaam en Password</p>";
        }
    } else {
        $alertLink = "<p>Fout! Check Gebruikersnaam en Password</p>";
    }
}
 
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>login | Admin</title>
    <link rel="shortcut icon" href="../img/fav-icon.png">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <form action="#" method="post" class="con">
        <img src="../img/lfc-logo.png">
        <h1>INLOGGEN DASHBOARD</h1>
        <div class="btn">
            <input type="email" placeholder="Email" id="username" name="email">
            <input type="password" placeholder="Password" id="password" name="password">
            <div class="btn-form">
                <?php echo $alertLink ?>
                <button type="submit">Log In</button>
                <a href="../index.php">Terug naar website</a>
            </div>
        </div>
    </form>
</body>
</html>