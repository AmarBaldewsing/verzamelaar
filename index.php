<?php
session_start();
if (isset($_SESSION['name'])) {
    $dashboardLink = '<li><a class="login" href="pages/admin.php">DASHBOARD</a></li>';
} else {
    $dashboardLink = '<li><a class="login" href="pages/login.php">LOG IN</a></li>';
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LFC Fans | Home</title>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="shortcut icon" href="./img/fav-icon.png">
    <script src="./js/nav.js" defer></script>
</head>
<body>
    <nav id="nav">
        <div class="wrapper con-nav">
            <a class="con-logo" href="index.php">
                <span class="logo">LFC</span>
            </a>
            <ul class="desk-links links" style="display: flex;">
                <li><a class="main" href="index.php">HOME</a></li>
                <li><a href="./pages/buy.php">VERZAMELING</a></li>
                <li><a href="./pages/contact.php">CONTACT</a></li>
                <?php echo $dashboardLink; ?>
            </ul>
        </div>
    </nav>
    <header>
        <video class="video-bg" autoplay muted loop>
            <source src="./img/header.mp4" type="video/mp4">
        </video>

        <div class="ani-f">
            <div class="con-header">
                <h1>DE BESTE LIVERPOOL FC PRODUCTEN, VOOR U VERZAMELD!</h1>
                <p>"Ontdek onze exclusieve Liverpool verzameling: iconische memorabilia voor echte voetbalfans. Beperkte beschikbaarheid!"</p>
                <a href="pages/item.php">Onze collectie</a>
            </div>
        </div>
    </header>
    <main>
        <div class="wrapper con-main">
            <h1>De beste collectie voor u!</h1>
            <div class="items">
            <?php
                if ($result->num_rows > 0) {
                    $cardCount = 0;
                
                    while ($row = $result->fetch_assoc()) {
                        if (is_array($row) && $cardCount < 3) {
                            echo "<div class='card'>";
                                echo '<img src="' . $row["img1"] . '" alt="' . $row["titel"] . '">';
                                echo '<h1 class="title-card">' . $row["titel"] . '</h1>';
                                echo '<p class="prijs"> $' . $row["prijs"] . '.00</p>';
                            echo "</div>";
                
                            $cardCount++;
                        }
                    }
                } else {
                    echo "No Result";
                }
                
            ?>
            </div>
        </div>
    </main>
    <section>
        <div class="wrapper con-sec">
            <h1>Neem contact op!</h1>
            <p>Wij staan 24/7 voor u klaar!</p>
            <a href="./pages/contact.php">Contact</a>
        </div>
    </section>
    <footer>
        <div class="wrapper  con-footer">
            <a class="con-logo" src="index.php">
                <img src="./img/lfc-logo.png" width="60">
                <span class="logo">LFC</span>
            </a>
            <ul class="links" style="display: flex;">
                <li><a href="index.php">HOME</a></li>
                <li><a href="./pages/buy.php">VERZAMELING</a></li>
                <li><a href="./pages/contact.php">CONTACT</a></li>
            </ul>
            <hr>
            <p class="copyrights">©Amar Baldewsing - All Rights Reserved 2023</p>
        </div>
    </footer>
</body>
</html>