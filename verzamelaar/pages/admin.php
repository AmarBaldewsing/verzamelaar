<?php
session_start();
if (isset($_SESSION['name'])) {
    $dashboardLink = '<li><a href="admin.php">DASHBOARD</a></li>';
} else {
    $dashboardLink = '<li><a href="login.php">LOG IN</a></li>';
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "verzamelaar";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Databaseverbinding is mislukt: " . $conn->connect_error);
}

$sql = "SELECT * FROM spullen";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="shortcut icon" href="../img/fav-icon.png" type="image/x-icon">
    <title>Admin page</title>
</head>
<body>
    <nav>
        <a class="btn-nav" href="../require/logout.php">Log out</a>
        <a class="btn-nav" href="../index.php">Home</a>
    </nav>
    <main>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titel</th>
                    <th>Beschrijving</th>
                    <th>Prijs</th>
                    <th>Actie</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='main'>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['titel'] . "</td>";
                            echo "<td class='desc'>" . $row['beschrijving'] . "</td>";
                            echo "<td>" . $row['prijs'] . "</td>";
                            echo "<td class='btn'><a href='../require/verwijder.php?id=" . $row['id'] . "' onclick='return confirmed()'>Verwijder</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "Geen items gevonden in de database.";
                }
                ?>
            </tbody>
        </table>
    </main>
    
    <section id="edit">
        <div>
            <h2>Toevoegen</h2>
            <form action="../require/process.php" method="post" enctype="multipart/form-data">
                <label for="title">Titel:</label>
                <input type="text" id="title" name="title" required><br>
                <label for="description">Beschrijving:</label>
                <textarea style="resize: none;" id="description" name="description" rows="4" required></textarea><br>
                <label for="size">Maat:</label>
                <input type="text" id="size" name="size"><br>
                <label for="gender">Geslacht:</label>
                <input type="text" id="gender" name="gender"><br>
                <label for="price">Prijs:</label>
                <input type="number" id="price" name="price" step="0.01" required><br>
                <label for="photo1">Foto 1 URL:</label>
                <input type="url" id="photo1" name="photo1" required><br>
                <label for="photo2">Foto 2 URL:</label>
                <input type="url" id="photo2" name="photo2"><br>
                <label for="photo3">Foto 3 URL:</label>
                <input type="url" id="photo3" name="photo3"><br>
                <input type="submit" value="Opslaan">
            </form>
        </div>

        <div>
            <h2>Aanpassen</h2>
            <form action="../require/update.php" method="post" enctype="multipart/form-data">
                <label for="edit_title">Titel:</label>
                <input type="text" id="edit_title" name="edit_title" required><br>
            
                <label for="edit_description">Beschrijving:</label>
                <textarea style="resize: none;" id="edit_description" name="edit_description" rows="4" required></textarea><br>
            
                <label for="edit_size">Maat:</label>
                <input type="text" id="edit_size" name="edit_size" ><br>
                <label for="edit_gender">Geslacht:</label>
                <input type="text" id="edit_gender" name="edit_gender" ><br>
            
                <label for="edit_price">Prijs:</label>
                <input type="number" id="edit_price" name="edit_price" step="0.01" required><br>
            
                <label for="edit_photo1">Foto 1 URL:</label>
                <input type="url" id="edit_photo1" name="edit_photo1" required><br>
            
                <label for="edit_photo2">Foto 2 URL:</label>
                <input type="url" id="edit_photo2" name="edit_photo2"><br>
            
                <label for="edit_photo3">Foto 3 URL:</label>
                <input type="url" id="edit_photo3" name="edit_photo3"><br>
            
                <label for="edit_id">id</label>
                <input type="text" id="edit_id" name="edit_id" required><br>
                <input type="submit" value="Opslaan">
            </form>
        </div>
    </section>
    <script>
        function confirmed() {
            return confirm("Weet je zeker dat je dit wilt verwijderen?");
        }
    </script>
</body>
</html>