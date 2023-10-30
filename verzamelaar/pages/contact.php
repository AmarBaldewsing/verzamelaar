<?php
session_start();
if (isset($_SESSION['name'])) {
    $dashboardLink = '<li><a class="login" href="admin.php">DASHBOARD</a></li>';
} else {
    $dashboardLink = '<li><a class="login" href="login.php">LOG IN</a></li>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="shortcut icon" href="../img/fav-icon.png">
    <link rel="stylesheet" href="../css/contact.css">
    <title>LFC Fans | Contact</title>
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
        <div class="wrapper con-header">
            <h1>Neem Contact Op</h1>
            <form action="../require/form_data.php" method="post">
                <div class="gegevens">
                    <p>gegevens:</p>
                    <div class="inputs">
                        <label class="naam" for="naam">Voor- en Achternaam:</label>
                        <input name="naam" type="text" id="naam" class="vld" required minlength="4" maxlength="20">
                    </div>
                    <div class="inputs">
                        <label class="email" for="email">Email:</label>
                        <input name="email" type="email" id="email" class="vld" required>
                    </div>
                    <div class="inputs">
                        <label class="telefoon" for="telefoon">Telefoonnummer:</label>
                        <input name="tel" type="tel" id="telefoon" class="vld" minlength="8" maxlength="10"  pattern="[0-9]+" required>
                    </div>
                    <div class="inputs">
                        <label class="bedrijfnaam" for="bedrijfnaam">Naam Bedrijf:</label>
                        <input name="bedrijf" type="text" id="bedrijfnaam" class="vld" required>
                    </div>
                </div>
                <div class="text">
                    <p>Uw Bericht:</p>
                    <label for="txt"></label>
                    <textarea id="txt" name="txt" required minlength="10"></textarea>
                </div>
                <div class="verzend">
                    <input class="button" type="submit" value="Verzenden">
                </div>
            </form>
        </div>
    </header>
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