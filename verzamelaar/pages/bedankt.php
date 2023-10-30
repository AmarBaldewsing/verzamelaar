<?php
session_start();
if (isset($_SESSION['name'])) {
    $dashboardLink = '<li><a href="admin.php">DASHBOARD</a></li>';
} else {
    $dashboardLink = '<li><a href="login.php">LOG IN</a></li>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="shortcut icon" href="./img/fav-icon.png">
    <link rel="stylesheet" href="../css/contact.css">
    <title>Liverpool Posters | Bedankt voor uw mail!</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
         .header {
            min-height: 75vh;
            display: grid;
            place-content: center;
            text-align: center;
            color: hsl(39, 40%, 15%);
        }

        h1 {  
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
        }

        p {
            font-family: 'Josefin Sans', sans-serif;
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
    <nav>
        <div class="wrapper con-nav">
            <a class="con-logo" src="../index.php">
                <img src="../img/lfc-logo.png" width="60">
                <span class="logo">LFC</span>
            </a>
            <div class="ham" style="display: none;">
                <span class="bar"></span>
            </div>
            <ul class="desk-links links" style="display: flex;">
                <li><a href="../index.php">HOME</a></li>
                <li><a href="buy.php">VERZAMELING</a></li>
                <li><a class="main" href="contact.php">CONTACT</a></li>
                <?php echo $dashboardLink; ?>
            </ul>
            <ul class="mobile-links links" style="display: none;">
                <li><a href="../index.php">Home</a></li>
                <li><a href="buy.php">Verzameling</a></li>
                <li><a href="contact.php">CONTACT</a></li>
            </ul>
        </div>
    </nav>
    <header>
        <div class="wrapper header">
            <h1>Bedankt voor het mailtje!</h1>
            <p>We proberen er zo spoedig mogelijk erop te reageren!</p>
        </div>
    </header>
    <footer>
        <div class="wrapper  con-footer">
            <a class="con-logo" src="../index.html">
                <img src="../img/lfc-logo.png" width="60">
                <span class="logo">LFC</span>
            </a>
            <ul class="links" style="display: flex;">
                <li><a href="../index.html">HOME</a></li>
                <li><a href="buy.php">VERZAMELING</a></li>
                <li><a href="contact.html">CONTACT</a></li>
            </ul>
            <hr>
            <p class="copyrights">©Amar Baldewsing - All Rights Reserved 2023</p>
        </div>
    </footer>
</body>
</html>