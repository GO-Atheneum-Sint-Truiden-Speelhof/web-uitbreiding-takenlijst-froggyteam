<!doctype html>
<html lang="nl">
<?php include('includes/head.php') ?>

<body>
    <div class="jumbotron">
        <h1 class="display-4 text-center">Bevestig je gegevens</h1>
    </div>
    
    <div class="container" style="max-width: 600px; margin: 0 auto;">
    <?php
    include ('scripts/mail.php');
    // Email ontvanger en onderwerp
    $ontvanger = "matt@localhost";
    $onderwerp = "Inschrijving Fotowedstrijd";

    // Formulierdata ophalen
    $naam = $_POST['naam'] ?? '';
    $straat_nr = $_POST['straat'] ?? '';
    $postcode = $_POST['postcode'] ?? '';
    $gemeente = $_POST['gemeente'] ?? '';
    $telefoon = $_POST['telefoon'] ?? '';
    $email = $_POST['email'] ?? '';
    $geboortedatum = $_POST['geboorte'] ?? '';  // Voeg een fallback toe om de waarschuwing te voorkomen
    
    $titel_foto = $_POST['titel'] ?? '';
    $camera = $_POST['camera'] ?? '';
    $lens = $_POST['lens'] ?? '';
    $beschrijving = $_POST['beschrijving'] ?? '';

    // Bericht opbouwen
    $bericht = "Naam: $naam\nStraat en Nr: $straat_nr\nPostcode: $postcode\ntelefoon: $telefoon\nGemeente: $gemeente\nE-mail adres: $email\nGeboortedatum: $geboortedatum\nTitel van de foto: $titel_foto\nCamera: $camera\nLens: $lens\nBeschrijving: $beschrijving";

    // E-mail headers opbouwen
    $headers = 'From: ' . $naam . ' <' . $email . '>' . "\r\n" .
               'Reply-To: ' . $email . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    // E-mail verzenden
    mail($ontvanger, $onderwerp, $bericht, $headers);
    
    sql();
    ?>

    <h2 class="text-center">Controleer je mail-box</h2>

    <ul class="list-group">
        <li class="list-group-item"><strong>Naam: </strong> <?= $naam; ?></li>
        <li class="list-group-item"><strong>Straat en Nr: </strong> <?= $straat_nr; ?></li>
        <li class="list-group-item"><strong>Postcode: </strong> <?= $postcode; ?></li>
        <li class="list-group-item"><strong>Gemeente: </strong> <?= $gemeente; ?></li>
        <li class="list-group-item"><strong>Telefoon: </strong> <?= $telefoon; ?></li>
        <li class="list-group-item"><strong>E-mail adres: </strong> <?= $email; ?></li>
        <li class="list-group-item"><strong>Geboortedatum: </strong> <?= $geboortedatum; ?></li>
        <li class="list-group-item"><strong>Titel van de foto: </strong> <?= $titel_foto; ?></li>
        <li class="list-group-item"><strong>Camera: </strong> <?= $camera; ?></li>
        <li class="list-group-item"><strong>Lens: </strong> <?= $lens; ?></li>
        <li class="list-group-item"><strong>Beschrijving van de foto: </strong> <?= $beschrijving; ?></li>
    </ul>
    
    
    

    </div>
</body>
</html>
