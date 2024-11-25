<?php
session_start();

$host = 'localhost';
$username = 'root';
$password = ''; // Voeg je databasewachtwoord hier toe als dat nodig is
$database = 'todo'; // Zorg ervoor dat de database bestaat

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Verbinding mislukt: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt ="SELECT * FROM user WHERE username";
    $result = $conn->query($stmt);

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: home.php");
            exit;
        }
    }
    $error = "Ongeldige inloggegevens.";
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
    <?php if (isset($error)) { echo "<div class='alert alert-danger'>$error</div>"; } ?>
</div>
</body>
</html>
