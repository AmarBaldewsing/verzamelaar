<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "verzamelaar";

// Controleer of de winkelwagen is gevuld
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $conn = new mysqli($servername, $username, $password, $dbname);
    
      $namentArray = array();
      $prijsArray = array();
      
      if (isset($_GET['remove']) && is_numeric($_GET['remove'])) {
        $removeID = $_GET['remove'];
        if (($key = array_search($removeID, $_SESSION['cart'])) !== false) {
            unset($_SESSION['cart'][$key]); // Verwijder het item uit de winkelwagen
        }
    }
    
    foreach ($_SESSION['cart'] as $itemID) {
        $sql = "SELECT * FROM spullen WHERE id = $itemID";
        $result = $conn->query($sql);
    
        if ($row = $result->fetch_assoc()) {
            $naam = $row['titel'];
            $prijs = $row['prijs'];
            
            $naamArray[] = $naam;
            $prijsArray[] = $prijs;
        }
    }
} else {
    echo "Je winkelwagen is leeg.";
    echo "<a href='item.php'>Ga Terug</a>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uw winkelwagen</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="shortcut icon" href="../img/fav-icon.png" type="image/x-icon">
</head>
<body>
    <nav>
        <a class="btn-nav" href="buy.php">Terug Naar Spullen</a>
    </nav>
    <main>
        <?php if (isset($winkelwagenLeeg)) { ?>
            <p><?php echo $winkelwagenLeeg; ?></p>
            <?php echo $gaTerugLink; ?>
        <?php } else { ?>
            <table border='1'>
                <tr><th>Productnaam</th><th>Prijs</th><th>Actie</th></tr>
                <?php for ($i = 0; $i < count($naamArray); $i++) { ?>
                    <tr>
                        <td><?php echo $naamArray[$i]; ?></td>
                        <td><?php echo $prijsArray[$i]; ?>.00$</td>
                        <td><a href="?remove=<?php echo $i; ?>">Verwijder</a></td>
                    </tr>
                <?php } ?>
            </table>
        <?php } ?>
    </main>
</body>
</html>