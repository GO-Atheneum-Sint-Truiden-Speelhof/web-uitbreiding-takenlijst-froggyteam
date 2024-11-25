<?php
$host = 'localhost';
$username = 'root';
$password = ''; // Databasewachtwoord indien nodig
$database = 'todo';

// Verbinding maken met database
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Verbinding mislukt: " . $conn->connect_error);
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Controleer of gebruikersnaam al bestaat
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $message = "Gebruikersnaam bestaat al.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        echo $hashed_password;
        // Gebruiker toevoegen aan database
        $stmt = $conn->prepare("INSERT INTO user (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $hashed_password);

        if ($stmt->execute()) {
            $message = "Registratie succesvol. Je kunt nu inloggen.";
        } else {
            $message = "Er is een fout opgetreden.";
        }
    }
}
?>
<!doctype html>
<html>
<head>
    <title>Registreren</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Registreren</h2>
    <form method="post" action="">
        <div class="mb-3">
            <label for="username">Gebruikersnaam:</label>
            <input type="text" name="username" id="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password">Wachtwoord:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Registreren</button>
    </form>
    <?php if ($message) { echo "<div class='alert alert-info'>$message</div>"; } ?>
    <a href="login.php">Terug naar inloggen</a>
</div>
</body>
</html>

