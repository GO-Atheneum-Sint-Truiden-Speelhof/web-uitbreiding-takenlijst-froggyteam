[![Review Assignment Due Date](https://classroom.github.com/assets/deadline-readme-button-22041afd0340ce965d47ae6ef1cefeee28c7c493a6346c4f15d667ab976d596c.svg)](https://classroom.github.com/a/Jdw9hS4j)
# Web-Php-MySQL Extra Oefening  (25 punten)

## CRUD-systeem voor een takenlijst (To-Do List)
### Doelen:

Leren werken met databases (MySQL) en server-side verwerking (PHP) voor het creëren, lezen, updaten en verwijderen (CRUD) van gegevens.
Front-end validatie en interactie via JavaScript.
Gebruik van Bootstrap voor een responsief en gestileerd interface.
Opdracht: Bouw een webapplicatie waarin een gebruiker een lijst van taken kan beheren (To-Do List). Gebruikers moeten taken kunnen toevoegen, bekijken, wijzigen en verwijderen. De applicatie moet een MySQL-database gebruiken om de taken op te slaan en een PHP-backend voor de interactie met de database. JavaScript moet worden gebruikt voor client-side validatie en dynamische updates, zonder de pagina te herladen (AJAX).

### Vereisten:

#### HTML en CSS/Bootstrap: (5 punten)

- Maak een formulier voor het invoeren van een nieuwe taak.
- Toon de lijst van taken in een gestileerde tabel, met knoppen om een taak te bewerken of te verwijderen.
- Zorg dat de layout responsief is met Bootstrap.

#### JavaScript: (2 punten)

Voeg client-side validatie toe aan het invoerformulier (bijv. taaknaam mag niet leeg zijn).

#### PHP en MySQL: (8 punten)

- Maak een MySQL-database met een tabel tasks (kolommen: id, task, status, created_at).
- Maak PHP-scripts voor CRUD-acties:
  * Create: Voeg een nieuwe taak toe.
  * Read: Haal taken op en toon ze in de tabel.
  * Update: Wijzig de naam of status van een taak.
  * Delete: Verwijder een taak.

### Extra uitdaging: (10 punten)

+ Voeg een filter toe (JavaScript) om taken te sorteren op status (bijv. "Alle", "Voltooid", "Niet voltooid").
+ Voeg Bootstrap modals toe voor het bewerken en verwijderen van taken in plaats van nieuwe pagina’s.
+ Gebruik AJAX om de lijst dynamisch bij te werken zonder de pagina te herladen.
+ Maak meerdere gebruikers. Gebruikers kunnen enkel hun eigen taken bekijken, bewerken en verwijderen.
+ Een 'verantwoordelijke' kan taken toekennen aan gebruikers. De toegekende gebruiker kan de taak niet bewerken of verwijderen  maar wel als 'Voltooid' markeren.
