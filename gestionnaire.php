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

    <div class="carte">
    <?php 
        // Inclure le fichier de connexion à la base de données
        include("bdd.php");
        
        // Exécutez la requête SQL pour récupérer toutes les colonnes de la table "compte"
        $query = "SELECT * FROM hebergement";
        $result = mysqli_query($idc, $query);
        
        
         // Afficher les données
         while ($row = mysqli_fetch_assoc($result)) {
            // Afficher les données 
            echo "Numéro de l'hébergement : " . $row['NOHEB'] . "<br>";
            echo "Type de l'hébergement : " . $row['CODETYPEHEB'] . "<br>";
            echo "Nom de l'hébergement : " . $row['NOMHEB']. "<br>";
            echo "Nombres de places : " . $row['NBPLACEHEB']. "<br>";
            echo "Surface : " . $row['SURFACEHEB']. " m² <br>";
            echo "Internet : " . $row['INTERNET']. "<br>";
            echo "Année de l'hébergement : " . $row['ANNEEHEB']. " ans <br>";
            echo "Secteur de l'hébergement : " . $row['SECTEURHEB']. "<br>";
            echo "Orientation de l'hébergement : " . $row['ORIENTATIONHEB']. "<br>";
            echo "État de l'hébergement : " . $row['ETATHEB']. "<br>";
            echo "Description de l'hébergement : " . $row['DESCRIHEB']. "<br>";
            echo "Image de l'hébergement : " . $row['PHOTOHEB']. "<br>";
            echo "Tarif de l'hébergement : " . $row['TARIFSEMHEB']. " $<br>";
            
            break;
         };

        // Fermer la connexion à la base de données
        mysqli_close($idc);
        ?>
    </div>
    <div class="carte">
    <?php 
        // Inclure le fichier de connexion à la base de données
        include("bdd.php");
        
        // Exécutez la requête SQL pour récupérer toutes les colonnes de la table "compte"
        $query = "SELECT * FROM hebergement";
        $result = mysqli_query($idc, $query);
        
        
         // Afficher les données
         while ($row = mysqli_fetch_assoc($result)) {
            // Afficher les données 
            echo "Numéro de l'hébergement : " . $row['NOHEB'] . "<br>";
            echo "Type de l'hébergement : " . $row['CODETYPEHEB'] . "<br>";
            echo "Nom de l'hébergement : " . $row['NOMHEB']. "<br>";
            echo "Nombres de places : " . $row['NBPLACEHEB']. "<br>";
            echo "Surface : " . $row['SURFACEHEB']. " m² <br>";
            echo "Internet : " . $row['INTERNET']. "<br>";
            echo "Année de l'hébergement : " . $row['ANNEEHEB']. " ans <br>";
            echo "Secteur de l'hébergement : " . $row['SECTEURHEB']. "<br>";
            echo "Orientation de l'hébergement : " . $row['ORIENTATIONHEB']. "<br>";
            echo "État de l'hébergement : " . $row['ETATHEB']. "<br>";
            echo "Description de l'hébergement : " . $row['DESCRIHEB']. "<br>";
            echo "Image de l'hébergement : " . $row['PHOTOHEB']. "<br>";
            echo "Tarif de l'hébergement : " . $row['TARIFSEMHEB']. " $<br>";
            
            break;
         };

        // Fermer la connexion à la base de données
        mysqli_close($idc);
        ?>
    </div>
    <h3><a href="ajoutevenement.php">Ajouter un Événement</a></h3>

    <div class="carte">
    <?php 
        // Inclure le fichier de connexion à la base de données
        include("bdd.php");
        
        // Exécutez la requête SQL pour récupérer toutes les colonnes de la table "compte"
        $query = "SELECT * FROM hebergement";
        $result = mysqli_query($idc, $query);
        
        
         // Afficher les données
         while ($row = mysqli_fetch_assoc($result)) {
            // Afficher les données 
            echo "Numéro de l'hébergement : " . $row['NOHEB'] . "<br>";
            echo "Type de l'hébergement : " . $row['CODETYPEHEB'] . "<br>";
            echo "Nom de l'hébergement : " . $row['NOMHEB']. "<br>";
            echo "Nombres de places : " . $row['NBPLACEHEB']. "<br>";
            echo "Surface : " . $row['SURFACEHEB']. " m² <br>";
            echo "Internet : " . $row['INTERNET']. "<br>";
            echo "Année de l'hébergement : " . $row['ANNEEHEB']. " ans <br>";
            echo "Secteur de l'hébergement : " . $row['SECTEURHEB']. "<br>";
            echo "Orientation de l'hébergement : " . $row['ORIENTATIONHEB']. "<br>";
            echo "État de l'hébergement : " . $row['ETATHEB']. "<br>";
            echo "Description de l'hébergement : " . $row['DESCRIHEB']. "<br>";
            echo "Image de l'hébergement : " . $row['PHOTOHEB']. "<br>";
            echo "Tarif de l'hébergement : " . $row['TARIFSEMHEB']. " $<br>";
            
            break;
         };

        // Fermer la connexion à la base de données
        mysqli_close($idc);
        ?>
    </div>
    <div class="carte">
    <?php 
        // Inclure le fichier de connexion à la base de données
        include("bdd.php");
        
        // Exécutez la requête SQL pour récupérer toutes les colonnes de la table "compte"
        $query = "SELECT * FROM hebergement";
        $result = mysqli_query($idc, $query);
        
        
         // Afficher les données
         while ($row = mysqli_fetch_assoc($result)) {
            // Afficher les données 
            echo "Numéro de l'hébergement : " . $row['NOHEB'] . "<br>";
            echo "Type de l'hébergement : " . $row['CODETYPEHEB'] . "<br>";
            echo "Nom de l'hébergement : " . $row['NOMHEB']. "<br>";
            echo "Nombres de places : " . $row['NBPLACEHEB']. "<br>";
            echo "Surface : " . $row['SURFACEHEB']. " m² <br>";
            echo "Internet : " . $row['INTERNET']. "<br>";
            echo "Année de l'hébergement : " . $row['ANNEEHEB']. " ans <br>";
            echo "Secteur de l'hébergement : " . $row['SECTEURHEB']. "<br>";
            echo "Orientation de l'hébergement : " . $row['ORIENTATIONHEB']. "<br>";
            echo "État de l'hébergement : " . $row['ETATHEB']. "<br>";
            echo "Description de l'hébergement : " . $row['DESCRIHEB']. "<br>";
            echo "Image de l'hébergement : " . $row['PHOTOHEB']. "<br>";
            echo "Tarif de l'hébergement : " . $row['TARIFSEMHEB']. " $<br>";
            
            break;
         };

        // Fermer la connexion à la base de données
        mysqli_close($idc);
        ?>
    </div>
    <footer>
        <p>&copy; 2023 Agence de Locations d'Appartement</p>
    </footer>
</body>
</html>

