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
    include("bdd.php");

    if (isset($_GET["submit"])) {
        $nom = $_GET["nom"];
        
        // Vous pouvez utiliser des paramètres liés pour éviter les injections SQL
        $query = "SELECT * FROM hebergement WHERE CONCAT(NOMHEB) LIKE '%$nom%'";
        $result = mysqli_query($idc, $query);

        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // Pour chaque enregistrement, une carte cera générez avec les informations
                echo '<div class="carte">';
                echo '<img src="./img/' . $row['PHOTOHEB'] . '" alt="Hébergement Photo">';
                echo '<p>Nom Hebergement: ' . (isset($row['NOMHEB']) ? $row['NOMHEB'] : '') . '</p>';
                echo '<p>Type Hebergement: ' . (isset($row['CODETYPEHEB']) ? $row['CODETYPEHEB'] : '') . '</p>';

                echo "<button><a href='reservation.php?numero=" . urlencode($row['NOHEB']) . "' class='lastth'>Réservé</a></button>";
                echo '</div>';
                
            }
        } else {
            echo "Aucun enregistrement trouvé dans la base de données.";
        }
    }

        $query = "SELECT * FROM hebergement";
        $result = mysqli_query($idc, $query);

        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // Pour chaque enregistrement, une carte cera générez avec les informations
                echo '<div class="carte">';
                echo '<img src="./img/' . $row['PHOTOHEB'] . '" alt="Hébergement Photo">';
                echo '<p>Nom Hebergement: ' . (isset($row['NOMHEB']) ? $row['NOMHEB'] : '') . '</p>';
                echo '<p>Type Hebergement: ' . (isset($row['CODETYPEHEB']) ? $row['CODETYPEHEB'] : '') . '</p>';

                echo "<button><a href='reservation.php?numero=" . urlencode($row['NOHEB']) . "' class='lastth'>Réservé</a></button>";
                echo '</div>';
                
            }
        } else {
            echo "Aucun enregistrement trouvé dans la base de données.";
        }

        // Fermer la connexion à la base de données
        mysqli_close($idc);
        ?>
        </div>
    </div>
    
    <footer>
        <p>&copy; 2023 Agence de Locations d'Appartement</p>
    </footer>
</body>
</html>