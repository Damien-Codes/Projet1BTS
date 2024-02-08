<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="hebergementvacancier.css">
    <title>Tableau de bord - Hebergement</title>
</head>
<body>
    <header>
        <h1>Tableau de bord - Vacanciers</h1>
    </header>
        <h3><a href="reservationvacancier.php">Retour aux réservations</a></h3>

        <?php 
        // Inclure le fichier de connexion à la base de données
        include("bdd.php");
        session_start();
        $numero = $_GET['numero'];
        // Exécutez la requête SQL pour récupérer toutes les colonnes de la table "compte"
        $query = "SELECT * FROM hebergement WHERE NOHEB = $numero";
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
         
        <h1>Veuillez  choisir une date pour terminer votre réservations :</h1>
        <form action="reservation.php" method="post">
        <center><div>
            Séléctionner une date : <input type="week" name="dateloc"><br>
            <!-- Champs du formulaire du Nombre d'Occupant -->
            Nombre d'Occupant :<input type="number" name="occupant" class="style1" min="1" ><br>
            <!-- Bouton qui envoie les information a la bdd -->
            <input type="submit" value="reservation" class="style2">
            <!-- Bouton qui enlève toutes les information du formulaire -->
            <input type="reset" value="Annuler" class="style2"><br>
            </div></center>
        </form>
        <?php


$sql = "INSERT INTO resa (USER, DATEDEBSEM, NOHEB, CODEETATRESA, DATERESA, DATEARRHES, MONTANTARRHES, NBOCCUPANT, TARIFSEMRESA)
        VALUES ($_SESSION, dateloc, NOHEB, CODEETATRESA, DATERESA, MONTANTARRHES, occupant, TARIFSEMRESA)";
        $result = mysqli_query($idc, $sql);

        // Exécutez la requête SQL pour récupérer toutes les colonnes de la table "compte"
        // INSERT INTO resa (USER, DATEDEBSEM, NOHEB, CODEETATRESA, DATERESA, NBOCCUPANT, 	TARIFSEMRESA) VALUES ($date, $occupant)
        $query = "INSERT INTO USER, DATEDEBSEM, NOHEB, CODEETATRESA, DATERESA, NBOCCUPANT, 	TARIFSEMRESA FROM RESA VALUES COMPTE, DATEDEBSEM, NOHEB, CODEETATRESA, $date, $occupant, TARIFSEMRESA";
        $result = mysqli_query($idc, $query);
                ?>
    <footer>
        <p>&copy; 2023 Agence de Locations d'Appartement</p>
    </footer>
</body>
</html>


