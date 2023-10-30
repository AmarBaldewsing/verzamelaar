<?php
session_start();
if (isset($_SESSION['name'])) {
    $dashboardLink = '<li><a class="login" href="admin.php">DASHBOARD</a></li>';
} else {
    $dashboardLink = '<li><a class="login" href="login.php">LOG IN</a></li>';
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "verzamelaar";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error) {
    die("Fout met verbinden, faggot!" . $conn->connect_error);
}

$sql = "SELECT * FROM spullen";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="shortcut icon" href="./img/fav-icon.png">
    <title>LFC Fans | Collectie</title>
    <link rel="shortcut icon" href="../img/fav-icon.png">
    <link rel="stylesheet" href="../css/buy.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <nav>
        <div class="wrapper con-nav">
            <a class="con-logo" href="../index.php">
                <span class="logo">LFC</span>
            </a>
            <div class="ham" style="display: none;">
                <span class="bar"></span>
            </div>
            <ul class="desk-links links" style="display: flex;">
                <li><a href="../index.php">HOME</a></li>
                <li><a class="main" href="buy.php">VERZAMELING</a></li>
                <li><a href="contact.php">CONTACT</a></li>
                <?php echo $dashboardLink; ?>
                <li  class="con-img" onclick="window.location.href = 'cart.php'; "><i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i></li>
            </ul>
            <ul class="mobile-links links" style="display: none;">
                <li><a href="../index.php">Home</a></li>
                <li><a href="buy.php">Verzameling</a></li>
                <li><a href="contact.php">CONTACT</a></li>
            </ul>
        </div>
    </nav>
    <main>
        <div class="wrapper con-main">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='card'>";
                    echo '<img src="' . $row["img1"] . '" alt="' . $row["titel"] . '">';
                    echo '<h1 class="title-card">' . $row["titel"] . '</h1>';
                    echo '<p class="prijs"> $' . $row["prijs"] . '.00</p>';
                    echo '<a href="./item.php?id=' . $row['id'] . '">Info</a>';
                echo "</div>";
            }
        } else {
            echo "No Result";
        }
        ?>
        </div>
    </main>
    <footer>
        <div class="wrapper  con-footer">
            <a class="con-logo" src="../index.php">
                <img src="../img/lfc-logo.png" width="60">
                <span class="logo">LFC</span>
            </a>
            <ul class="links" style="display: flex;">
                <li><a href="../index.php">HOME</a></li>
                <li><a href="buy.php">VERZAMELING</a></li>
                <li><a href="contact.php">CONTACT</a></li>
            </ul>
            <hr>
            <p class="copyrights">©Amar Baldewsing - All Rights Reserved 2023</p>
        </div>
    </footer>
</body>
</html>