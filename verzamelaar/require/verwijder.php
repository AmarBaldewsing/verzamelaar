<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "verzamelaar";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Databaseverbinding is mislukt: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $itemId = $_GET['id'];

    $sql = "DELETE FROM spullen WHERE id = $itemId";

    if ($conn->query($sql) === TRUE) {
        header("location: ../pages/admin.php");
    } else {
        echo "Fout bij het verwijderen van het item: " . $conn->error;
    }
} else {
    echo "Geen item-ID opgegeven om te verwijderen.";
}

$conn->close();
?>