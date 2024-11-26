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

// Verwerk het formulier na verzending
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Controleer of velden zijn ingesteld en niet leeg
    $titel = isset($_POST['titel']) ? trim($_POST['titel']) : null;
    $datum = isset($_POST['datum']) ? trim($_POST['datum']) : null;
    $beschrijving = isset($_POST['beschrijving']) ? trim($_POST['beschrijving']) : null;

    // Controleer of verplichte velden zijn ingevuld
    if ($titel && $datum && $beschrijving) {
        // SQL-query met prepared statements
        $stmt = $conn->prepare("INSERT INTO taken (titel, datum, beschrijving) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $titel, $datum, $beschrijving);

        if ($stmt->execute()) {
            echo "Taak succesvol opgeslagen!";
        } else {
            echo "Fout bij opslaan van taak: " . $conn->error;
        }

        $stmt->close();
    } else {
        echo "Alle velden zijn verplicht!";
    }
}

$conn->close();
?>

<form method="post" action="">
    <label for="titel">Titel van taak</label><br>
    <p><input required id="titel" type="text" name="titel" size="46"></p>

    <label for="datum">Deadline</label><br>
    <p><input required id="datum" type="date" name="datum" size="46"></p>

    <label for="beschrijving">Beschrijf uw taak</label><br>
    <p><textarea required id="beschrijving" name="beschrijving" rows="5" cols="50"></textarea></p>

    <input type="submit" value="Opslaan">
</form>
