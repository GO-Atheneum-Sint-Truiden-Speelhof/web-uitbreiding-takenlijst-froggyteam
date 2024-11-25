<?php
// Databaseconfiguratie
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todo";

// Maak een databaseverbinding
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Verbinding mislukt: " . $conn->connect_error);
}

// SQL-query om alle taken op te halen
$sql = "SELECT id, titel, datum, beschrijving FROM taken ORDER BY datum ASC";
$result = $conn->query($sql);

// Controleer of er resultaten zijn
if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Titel</th><th>Deadline</th><th>Beschrijving</th></tr>";

    // Gegevens ophalen en weergeven in een tabel
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['titel']) . "</td>";
        echo "<td>" . htmlspecialchars($row['datum']) . "</td>";
        echo "<td>" . htmlspecialchars($row['beschrijving']) . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Geen taken gevonden.";
}

$conn->close();
?>
