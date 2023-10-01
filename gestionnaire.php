<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="gestionnaire.css">
    <title>Tableau de bord - Gestionnaire</title>
</head>
<body>
    <header>
        <h1>Tableau de bord - Gestionnaire</h1>
        <nav>
            <ul>
                <li><a href="gestionnaire.php">Accueil</a></li>
                <li><a href="ajouthebergement.php">Hébergements</a></li>
                <li><a href="#">Événements</a></li>
                <li><a href="deconnexion.php">Déconnexion</a></li>
            </ul>
        </nav>
    </header>
        <h3><a href="ajouthebergement.php">Ajouter un Hébergement</a></h3>
        
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
                
                echo "<button><a href='modifier.php?numero=" . urlencode($row['NOHEB']) . "' class='lastth'>🔧</a></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                echo "<button><a href='supprimehebergement.php?numero=" . urlencode($row['NOHEB']) . "' class='lastth'>❌</a></button></br></br>";
                echo "<button><a href='ensavoirplus.php?numero=" . urlencode($row['NOHEB']) . "' class='lastth'>En Savoir +</a></button>";
                echo '</div>';
                
            }
        } else {
            echo "Aucun enregistrement trouvé dans la base de données.";
        }

        // Fermer la connexion à la base de données
        mysqli_close($idc);
        ?>
    <h3><a href="ajoutevenement.php">Ajouter un Événement</a></h3>


    <footer>
        <p>&copy; 2023 Agence de Locations d'Appartement</p>
    </footer>
</body>
</html>

