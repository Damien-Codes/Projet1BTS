<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="gestionnaire.css">
    <title>Tableau de bord - Hebergement</title>
</head>
<body>
    <header>
        <h1>Tableau de bord - Hebergement</h1>
    </header>
        <h3><a href="gestionnaire.php">Accueil</a></h3>

        <?php 
        // Inclure le fichier de connexion à la base de données
        include("bdd.php");
        
        // Exécutez la requête SQL pour récupérer toutes les colonnes de la table "compte"
        $query = "SELECT * FROM hebergement";
        $result = mysqli_query($idc, $query);
        
        
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // Pour chaque enregistrement, une carte cera générez avec les informations
                echo '<div class="carte">';
                echo '<img src="./img/' . $row['PHOTOHEB'] . '" alt="Hébergement Photo">';
                echo '<p>Numéro Hebergement: ' . (isset($row['NOHEB']) ? $row['NOHEB'] : '') . '</p>';
                echo '<p>Type Hebergement: ' . (isset($row['CODETYPEHEB']) ? $row['CODETYPEHEB'] : '') . '</p>';
                echo '<p>Surfaces: ' . (isset($row['SURFACEHEB']) ? $row['SURFACEHEB'] : '') . ' m²</p>';
                echo '<p>Nombre de places: ' . (isset($row['NBPLACEHEB']) ? $row['NBPLACEHEB'] : '') . '</p>';
                echo '<p>INTERNET: ' . (isset($row['INTERNET']) ? ($row['INTERNET'] ? 'Oui' : 'Non') : '') . '</p>';
                echo '<p>Orientation: ' . (isset($row['ORIENTATIONHEB']) ? $row['ORIENTATIONHEB'] : '') . '</p>';
                echo '<p>Etat: ' . (isset($row['ETATHEB']) ? $row['ETATHEB'] : '') . '</p>';
                echo '<p>Tarif: ' . (isset($row['TARIFSEMHEB']) ? $row['TARIFSEMHEB'] : '') . ' $</p>';
                echo '</div>';
                
            }
        } else {
            echo "Aucun enregistrement trouvé dans la base de données.";
        }

        // Fermer la connexion à la base de données
        mysqli_close($idc);
        ?>

        <?php

        // Inclure le fichier de connexion à la base de données
        include("bdd.php");

        // Récupérer l'identifiant de l'hébergement sélectionné à partir de l'URL
        $id = $_GET['numero'];


        // Exécuter une requête SQL pour récupérer les informations de l'hébergement sélectionné
        $query = "SELECT * FROM hebergement WHERE NOHEB = ?";
        $stmt = $idc->prepare($query);
        $stmt->execute(array($id));
        
        // Récupérer les données de l'hébergement sélectionné
        $row = $stmt->fetch();

        if ($stmt->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($stmt)) {
        // Afficher les informations de l'hébergement sélectionné dans la page
        echo '<div class="carte">';
                        echo '<img src="' . (isset($row['PHOTOHEB'])) . '" alt="Hébergement Photo">';
                        echo '<h2>' . (isset($row['NOMHEB']) ? $row['NOMHEB'] : '') . '</h2>';
                        echo '<p>Numéro Hebergement: ' . (isset($row['NOHEB']) ? $row['NOHEB'] : '') . '</p>';
                        echo '<p>Type Hebergement: ' . (isset($row['CODETYPEHEB']) ? $row['CODETYPEHEB'] : '') . '</p>';
                        echo '<p>Nombre de places: ' . (isset($row['NBPLACEHEB']) ? $row['NBPLACEHEB'] : '') . '</p>';
                        echo '<p>Surfaces: ' . (isset($row['SURFACEHEB']) ? $row['SURFACEHEB'] : '') . ' m²</p>';
                        echo '<p>INTERNET: ' . (isset($row['INTERNET']) ? ($row['INTERNET'] ? 'Oui' : 'Non') : '') . '</p>';
                        echo '<p>Années: ' . (isset($row['ANNEEHEB']) ? $row['ANNEEHEB'] : '') . '</p>';
                        echo '<p>Secteur: ' . (isset($row['SECTEURHEB']) ? $row['SECTEURHEB'] : '') . '</p>';
                        echo '<p>Orientation: ' . (isset($row['ORIENTATIONHEB']) ? $row['ORIENTATIONHEB'] : '') . '</p>';
                        echo '<p>Etat: ' . (isset($row['ETATHEB']) ? $row['ETATHEB'] : '') . '</p>';
                        echo '<p>Description: ' . (isset($row['DESCRIHEB']) ? $row['DESCRIHEB'] : '') . '</p>';
                        echo '<p>Tarif: ' . (isset($row['TARIFSEMHEB']) ? $row['TARIFSEMHEB'] : '') . ' $</p>';

                        echo "<button><a href='modifier.php?numero=" . urlencode(isset($row['NOHEB'])) . "' class='lastth'>🔧</a></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                        echo "<button><a href='supprimehebergement.php?numero=" . urlencode(isset($row['NOHEB'])) . "' class='lastth'>❌</a></button>";
                        echo '</div>';
                    }
                
                }
        // Fermer la connexion à la base de données
        mysqli_close($idc);

        ?>


    <footer>
        <p>&copy; 2023 Agence de Locations d'Appartement</p>
    </footer>
</body>
</html>


