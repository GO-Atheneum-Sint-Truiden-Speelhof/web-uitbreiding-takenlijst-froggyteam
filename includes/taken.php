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

// Controleer of een taak moet worden verwijderd of aangepast
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    // Verwijder een taak
    if ($action === 'delete' && isset($_POST['titel'], $_POST['datum'], $_POST['beschrijving'])) {
        $titel = $_POST['titel'];
        $datum = $_POST['datum'];
        $beschrijving = $_POST['beschrijving'];

        $sql = "DELETE FROM taken WHERE titel = ? AND datum = ? AND beschrijving = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $titel, $datum, $beschrijving);

        if ($stmt->execute()) {
            echo "<p class='tegel'>Taak succesvol verwijderd.</p>";
        } else {
            echo "<p class='tegel'>Fout bij verwijderen: " . $conn->error . "</p>";
        }
        $stmt->close();
    }

    // Bewerk een taak
    elseif ($action === 'edit' && isset($_POST['oude_titel'], $_POST['oude_datum'], $_POST['oude_beschrijving'], $_POST['titel'], $_POST['datum'], $_POST['beschrijving'])) {
        $oude_titel = $_POST['oude_titel'];
        $oude_datum = $_POST['oude_datum'];
        $oude_beschrijving = $_POST['oude_beschrijving'];

        $nieuwe_titel = $_POST['titel'];
        $nieuwe_datum = $_POST['datum'];
        $nieuwe_beschrijving = $_POST['beschrijving'];

        $sql = "UPDATE taken SET titel = ?, datum = ?, beschrijving = ? WHERE titel = ? AND datum = ? AND beschrijving = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $nieuwe_titel, $nieuwe_datum, $nieuwe_beschrijving, $oude_titel, $oude_datum, $oude_beschrijving);

        if ($stmt->execute()) {
            echo "<p class='tegel'>Taak succesvol bijgewerkt.</p>";
        } else {
            echo "<p class='tegel'>Fout bij bewerken: " . $conn->error . "</p>";
        }
        $stmt->close();
    }
}

// SQL-query om alle taken op te halen
$sql = "SELECT titel, datum, beschrijving FROM taken ORDER BY datum ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1' class='table'>";
    echo "<tr><th>Titel</th><th>Deadline</th><th>Beschrijving</th><th>Acties</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['titel']) . "</td>";
        echo "<td>" . htmlspecialchars($row['datum']) . "</td>";
        echo "<td>" . htmlspecialchars($row['beschrijving']) . "</td>";
        echo "<td>";
        
        // Verwijder afbeelding als knop
        echo "<form method='POST' style='display:inline;'>";
        echo "<input type='hidden' name='action' value='delete'>";
        echo "<input type='hidden' name='titel' value='" . htmlspecialchars($row['titel']) . "'>";
        echo "<input type='hidden' name='datum' value='" . htmlspecialchars($row['datum']) . "'>";
        echo "<input type='hidden' name='beschrijving' value='" . htmlspecialchars($row['beschrijving']) . "'>";
        echo "<button type='submit' style='border:none; background:none; cursor:pointer;'>";
        echo "<img src='images/verwijderen.jpg' alt='Verwijderen' style='width:24px; height:24px;'>";
        echo "</button>";
        echo "</form>";

        // Bewerk afbeelding als knop
        echo "<form method='POST' style='display:inline;'>";
        echo "<input type='hidden' name='action' value='edit_form'>";
        echo "<input type='hidden' name='titel' value='" . htmlspecialchars($row['titel']) . "'>";
        echo "<input type='hidden' name='datum' value='" . htmlspecialchars($row['datum']) . "'>";
        echo "<input type='hidden' name='beschrijving' value='" . htmlspecialchars($row['beschrijving']) . "'>";
        echo "<button type='submit' style='border:none; background:none; cursor:pointer;'>";
        echo "<img src='images/aanpassen.jpg' alt='Aanpassen' style='width:24px; height:24px;'>";
        echo "</button>";
        echo "</form>";

        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p class='tegel'>Geen taken gevonden.</p>";
}

// Formulier om een taak te bewerken tonen
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'edit_form') {
    $titel = $_POST['titel'];
    $datum = $_POST['datum'];
    $beschrijving = $_POST['beschrijving'];

    echo "<h3>Bewerk Taak</h3>";
    echo "<form method='POST'>";
    echo "<input type='hidden' name='action' value='edit'>";
    echo "<input type='hidden' name='oude_titel' value='" . htmlspecialchars($titel) . "'>";
    echo "<input type='hidden' name='oude_datum' value='" . htmlspecialchars($datum) . "'>";
    echo "<input type='hidden' name='oude_beschrijving' value='" . htmlspecialchars($beschrijving) . "'>";
    echo "Titel: <input type='text' name='titel' value='" . htmlspecialchars($titel) . "'><br>";
    echo "Datum: <input type='date' name='datum' value='" . htmlspecialchars($datum) . "'><br>";
    echo "Beschrijving: <textarea name='beschrijving'>" . htmlspecialchars($beschrijving) . "</textarea><br>";
    echo "<button type='submit'>Opslaan</button>";
    echo "</form>";
}

$conn->close();
?>
