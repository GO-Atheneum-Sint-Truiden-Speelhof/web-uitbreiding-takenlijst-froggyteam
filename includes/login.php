<?php
session_start(); // Start the session

function checkLoginAndFetchMatch() {
    $servername = "localhost";
    $username = "matt";
    $password = "123";
    $dbname = "test";

    // Verbinding maken met de database
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        // Sanitize user input to prevent SQL injection
        $gebruikersnaam = $conn->real_escape_string($_POST['gebruikersnaam']);
        $wachtwoord = $conn->real_escape_string($_POST['wachtwoord']);

        // Check if the login exists
        $sql = "SELECT * FROM gebruikersnaam WHERE gebruikersnaam = '$gebruikersnaam' AND wachtwoord = '$wachtwoord'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Login is correct, set the session
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $gebruikersnaam;
        } else {
            echo "<p class='message'>Onjuiste gebruikersnaam of wachtwoord.</p>";
            return;
        }
    }

    // Fetch and display all data from the wedstrijd table
    $wedstrijdSql = "SELECT * FROM wedstrijd";
    $wedstrijdResult = $conn->query($wedstrijdSql);

    if ($wedstrijdResult->num_rows > 0) {
        echo '<div class="wedstrijd-grid">';

        while ($row = $wedstrijdResult->fetch_assoc()) {
            echo '<div class="wedstrijd-card">';
            echo '<h2>Wedstrijd Details</h2>';
            echo '<div class="wedstrijd-details">';
            foreach ($row as $columnName => $columnValue) {
                echo '<div class="detail-item">';
                echo '<span class="detail-label">' . ucfirst($columnName) . ':</span> ';
                echo '<span class="detail-value">' . (isset($columnValue) ? htmlspecialchars($columnValue) : 'Geen data beschikbaar') . '</span>';
                echo '</div>';
            }
            echo '</div>';
            echo '</div>'; 
        }

        echo '</div>';
        echo '<form method="POST" action="logout.php"><input type="submit" value="Logout"></form>';
    } else {
        echo "<p class='message'>Geen wedstrijdgegevens gevonden.</p>";
    }

    // Verbinding sluiten
    $conn->close();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    checkLoginAndFetchMatch();
}
?>

<!-- HTML Form for user login -->
<?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true): ?>
    <form method="POST" action="">
        <label for="gebruikersnaam">Gebruikersnaam:</label>
        <input type="text" id="gebruikersnaam" name="gebruikersnaam" required><br>
        <label for="wachtwoord">Wachtwoord:</label>
        <input type="password" id="wachtwoord" name="wachtwoord" required><br>
        <input type="submit" value="Login">
    </form>
<?php endif; ?>

<!-- Logout script (logout.php) -->
<?php
// logout.php
session_start();
session_unset();
session_destroy();
header("Location: login.php"); // Redirect to login page
exit();
?>


<!-- CSS for styling -->
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
        background-color: #f0f4f8;
    }
    .wedstrijd-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }
    .wedstrijd-card {
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        border: 1px solid #ddd;
    }
    .wedstrijd-card h2 {
        text-align: center;
        color: #333;
        margin-bottom: 15px;
        border-bottom: 2px solid #007BFF;
        padding-bottom: 5px;
    }
    .wedstrijd-details .detail-item {
        margin-bottom: 10px;
        display: flex;
        justify-content: space-between;
    }
    .detail-label {
        font-weight: bold;
        color: #555;
    }
    .detail-value {
        color: #333;
    }
    .message {
        color: #d9534f;
        font-weight: bold;
    }
    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        margin: auto;
    }
    form label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }
    form input[type="text"], form input[type="password"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    form input[type="submit"] {
        background-color: #007BFF;
        color: #fff;
        border: none;
        padding: 10px 15px;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
    }
    form input[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>
