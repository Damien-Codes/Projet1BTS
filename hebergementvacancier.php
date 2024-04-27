<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="hebergementvacancier.css">
    <title>Tableau de bord - Vancancier</title>
</head>
<body>
    <header>
        <h1>Tableau de bord - Vancancier</h1>
        <nav>
            <ul>
                <li><a href="vacanciers.php">Accueil</a></li>
                <li><a href="hebergementvacancier.php">Voir les Hébergements</a></li>
                <li><a href="reservationvacancier.php">Réservations</a></li>
                <li><a href="deconnexion.php">Déconnexion</a></li>
            </ul>
        </nav>
    </header>


    <div class="container">
        <h2>Découvrez de nouvelles offres de locations</h2><br>

        <form action="" method="GET" style='text-align: center'>
            <input type="text" name="nom" placeholder="Nom..."> <br>
            <input type="submit" name="submit" value="Rechercher">
    </form>

    <?php
// Include database connection file (assuming it uses mysqli)
include("bdd.php");

// Search functionality
if (isset($_GET["submit"])) {
    $nom = $_GET["nom"];

    // Execute sanitized search query using GROUP BY to eliminate duplicates
    $query = "SELECT * FROM hebergement WHERE NOMHEB LIKE '%$nom%' GROUP BY NOHEB";
    $result = mysqli_query($idc, $query);

    // Display search results if any
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="carte">';
            echo '<img src="./img/' . $row['PHOTOHEB'] . '" alt="Hébergement Photo">';
            echo '<p>Nom Hebergement: ' . $row['NOMHEB'] . '</p>';
            echo '<p>Type Hebergement: ' . $row['CODETYPEHEB'] . '</p>';
            echo '<p>Secteur de l\'hebergement: ' . $row['SECTEURHEB'] . '</p>';
            echo "<button><a href='ensavoirplusvac.php?numero=" . urlencode($row['NOHEB']) . "' class='lastth'>En Savoir +</a></button>";
            echo '</div>';
        }
    } else {
        echo "Aucun enregistrement trouvé lié à votre recherche.";
    }

    // Close the database connection
}

// Display all accommodations (default view)
$querys = "SELECT * FROM hebergement";
$result = mysqli_query($idc, $querys);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="carte">';
        echo '<img src="./img/' . $row['PHOTOHEB'] . '" alt="Hébergement Photo">';
        echo '<p>Nom Hebergement: ' . $row['NOMHEB'] . '</p>';
        echo '<p>Type Hebergement: ' . $row['CODETYPEHEB'] . '</p>';
        echo '<p>Secteur de l\'hebergement: ' . $row['SECTEURHEB'] . '</p>';
        echo "<button><a href='ensavoirplusvac.php?numero=" . urlencode($row['NOHEB']) . "' class='lastth'>En Savoir +</a></button>";
        echo '</div>';
    }
} else {
    echo "Aucun enregistrement trouvé dans la base de données.";
}
?>



        </div>
    </div>
    
    <footer>
        <p>&copy; 2023 Agence de Locations d'Appartement</p>
    </footer>
</body>
</html>