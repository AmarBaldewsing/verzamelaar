<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "verzamelaar";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Databaseverbinding is mislukt: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $edit_id = $_POST['edit_id'];
    $edit_title = $_POST['edit_title'];
    $edit_description = $_POST['edit_description'];
    $edit_size = $_POST['edit_size'];
    $edit_gender = $_POST['edit_gender'];
    $edit_price = $_POST['edit_price'];
    $edit_photo1 = $_POST['edit_photo1'];
    $edit_photo2 = $_POST['edit_photo2'];
    $edit_photo3 = $_POST['edit_photo3'];

    $sql = "UPDATE spullen SET titel = ?, img1 = ?, img2 = ?, img3 = ?, prijs = ?, beschrijving = ?, maat = ?, geslacht = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssdsssi", $edit_title, $edit_photo1, $edit_photo2, $edit_photo3, $edit_price, $edit_description, $edit_size, $edit_gender, $edit_id);

    if ($stmt->execute()) {
        header("location: ../pages/admin.php");
    } else {
        echo "Fout bij het bijwerken van het item: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>