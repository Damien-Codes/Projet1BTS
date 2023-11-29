<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Inclure le fichier de connexion à la base de données
include("bdd.php");

// Récupère les informations sur l'hébergement
$hébergement = getHébergementById($_GET["hébergement"]);

// Affiche les informations sur l'hébergement
echo "<h1>Réservation de l'hébergement <strong>$hébergement->nom</strong></h1>";
echo "<p>Prix : <strong>€$hébergement->prix</strong></p>";
echo "<p>Capacité : <strong>$hébergement->capacité</strong></p>";

// Affiche la liste des semaines disponibles
$semaines = getSemainesDisponibles($hébergement->id);
echo "<ul>";
foreach ($semaines as $semaine) {
    echo "<li><a href='reservation-form.php?hébergement=$hébergement->id&semaine=$semaine->id'>$semaine->date_debut</strong> - <strong>$semaine->date_fin</strong></a></li>";
}
echo "</ul>";

?>

</body>
</html>