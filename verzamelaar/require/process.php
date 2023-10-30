<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "verzamelaar";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Databaseverbinding is mislukt: " . $conn->connect_error);
}

$titel = $_POST['title'];
$beschrijving = $_POST['description'];
$maat = $_POST['size'];
$geslacht = $_POST['gender'];
$prijs = $_POST['price'];
$img1 = $_POST['photo1'];
$img2 = $_POST['photo2'];
$img3 = $_POST['photo3'];

$sql = "INSERT INTO spullen (titel, img1, img2, img3, prijs, beschrijving, maat, geslacht) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssdsss", $titel, $img1, $img2, $img3, $prijs, $beschrijving, $maat, $geslacht);

if ($stmt->execute()) {
    header("location: ../pages/admin.php");
} else {
    echo "Fout bij het toevoegen van het item aan de database: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>