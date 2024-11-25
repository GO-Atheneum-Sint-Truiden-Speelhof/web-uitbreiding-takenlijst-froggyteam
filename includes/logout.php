<?php
session_start(); // Start de sessie

// Verwijder alle sessievariabelen
session_unset();

// Vernietig de sessie
session_destroy();

// Omleiden naar de loginpagina of een andere gewenste pagina
header("Location: login.php"); // Pas 'index.php' aan als je een andere redirect nodig hebt
exit();
