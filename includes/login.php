<?php
session_start();

$host = 'localhost';
$username = 'root';
$password = ''; // Databasewachtwoord indien nodig
$database = 'todo';

// Verbinding maken met database
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Verbinding mislukt: " . $conn->connect_error);
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Gebruiker ophalen uit database
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Controleer wachtwoord
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: home.php");
            exit;
        } else {
            $error = "Ongeldig wachtwoord.";
        }
    } else {
        $error = "Gebruikersnaam bestaat niet.";
    }
}
?>
<!doctype html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Inloggen</h2>
    <form method="post" action="">
        <div class="mb-3">
            <label for="username">Gebruikersnaam:</label>
            <input type="text" name="username" id="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password">Wachtwoord:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <?php if ($error) { echo "<div class='alert alert-danger'>$error</div>"; } ?>
    <a href="includes/regis.php">Nog geen account? Registreer hier.</a>
</div>
</body>
</html>
