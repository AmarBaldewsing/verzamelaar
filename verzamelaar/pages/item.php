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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="shortcut icon" href="../img/fav-icon.png">
    <title>LFC Fans | Uw Gekozen product</title>
    <link rel="stylesheet" href="../css/item.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
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
                <li><a href="buy.php">VERZAMELING</a></li>
                <li><a href="contact.php">CONTACT</a></li>
                <?php echo $dashboardLink; ?>
                <li  class="con-img" onclick="window.location.href = 'cart.php'; "><i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i></li>
            </ul>
        </div>
    </nav>
    <main>
        <div class="wrapper con-main">
        <?php
        $itemID = $_GET['id'];

        $sql = "SELECT * FROM spullen WHERE id = $itemID";
        $result = $conn->query($sql);

        if($row = $result->fetch_assoc()) {
            $imgItem1 = $row["img1"];
            $imgItem3 = $row["img3"];
            $imgItem2 = $row["img2"];

            $titelItem = $row["titel"];
            $descItem = $row["beschrijving"];
            $prijsItem = $row["prijs"];
            $MaatItem = $row["maat"];
            $sexItem = $row["geslacht"];
        }
        ?>
        <div class="con-images" id="slider">
            <div class="img img1" style="background-image: url('<?php echo $imgItem1; ?>');"></div>
            <div class="img img2" style="background-image: url('<?php echo $imgItem2; ?>');"></div>
            <div class="img img3" style="background-image: url('<?php echo $imgItem3; ?>');"></div>
        </div>
        <h1 class="title"> <?php echo $titelItem ?></h1>
        <div class="info">
            <p>$<?php echo $prijsItem ?>.00</p>
            <p><?php echo "maat: $MaatItem" ?></p>
            <p><?php echo "Voor: $sexItem" ?></p>
        </div>
        <p class="desc"><?php echo $descItem ?></p>
        <a href="voegtoe.php?id=<?php echo $itemID; ?>" onclick='return confirmed()'>Voeg toe aan winkelwagen</a>
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
    <script>
        function confirmed() {
           window.alert("Toevoegd aan de winkelwagen!");
        }
    </script>
</body>
</html>