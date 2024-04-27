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
        $numero = $_GET["numero"];
        // Exécutez la requête SQL pour récupérer toutes les colonnes de la table "compte"
        $query = "SELECT * FROM hebergement WHERE NOHEB = $numero";
        $result = mysqli_query($idc, $query);
        

        $hebergement;


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
                $hebergement = $row;    
            }
        } else {
            echo "Aucun enregistrement trouvé dans la base de données.";
        }

        // Fermer la connexion à la base de données
        
        ?>
         
        <h1>Veuillez  choisir une date pour terminer votre réservations :</h1>
        <form method="post">
        <center><div>
        <label for="select_option">Sélectionnez une option :</label>
        <select name="dateloc" id="select_option">
            <?php

            // Requête pour récupérer les données
            $querys = "SELECT * FROM semaine";
            $result = mysqli_query($idc, $querys);
            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row['DATEDEBSEM'] . '">' . $row['DATEDEBSEM'] . '</option>';
                }
            } else {
                echo '<option value="">Aucune option disponible</option>';
            }
            ?>
        </select>
        <select name="CODEETATRESA" id="select_option">
        <?php
        // Requête pour récupérer les données
            $queryss = "SELECT * FROM etat_resa";
            $result = mysqli_query($idc, $queryss);
            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row['CODEETATRESA'] . '">' . $row['CODEETATRESA'] . '</option>';
                }
            } else {
                echo '<option value="">Aucune option disponible</option>';
            }
            ?>
        </select>
        
            Nombre d'Occupant :<input type="number" name="occupant" class="style1" min="1" ><br>
            <!-- Bouton qui envoie les information a la bdd -->
            <input type="submit" value="reservation" class="style2">
            <!-- Bouton qui enlève toutes les information du formulaire -->
            <input type="reset" value="Annuler" class="style2"><br>
            
        </select>
            </div></center>
        </form>


        <?php
        
// Traitement de la réservation (si le formulaire est soumis)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les valeurs du formulaire
    $dateloc = $_POST['dateloc'];
    $nbOccupant = $_POST['occupant'];
    $montantarrhes = $_POST['CODEETATRESA'];
    


    // Récupérer les informations d'hébergement depuis la variable $row (déjà récupérées précédemment)
    $noheb = $hebergement['NOHEB'];
    $codeetatresa = $hebergement['CODETYPEHEB'];
    // $montantarrhes = $hebergement['CODEETATRESA'];
    $tarifsemresa = $hebergement['TARIFSEMHEB'];
    $numero = $_GET['numero'];
    
    // Initialiser les autres variables avec des valeurs par défaut (si nécessaire)
    $datedebsem = $_POST['dateloc']; // Date de début de semaine
    $dateresa = date("Y-m-d"); // Date de réservation
    $datearrhes = ""; // date NULL

    $user = $_SESSION['user'];

    // $NORESA = "SELECT COUNT(NORESA) FROM resa";
    // $resultat = mysqli_query($idc, $NORESA);
    // if($resultat = NULL){
    //     $numresa = 0;
    // }
    // else{
    //     $numresa = $resulat + 1;
    // }

    // Construire la requête SQL d'insertion
    $sql = "INSERT INTO resa
            (NORESA, USER, DATEDEBSEM, NOHEB, CODEETATRESA, DATERESA, DATEARRHES, MONTANTARRHES, NBOCCUPANT, TARIFSEMRESA)
            VALUES ($noheb,
                    '$user',
                   '$datedebsem',
                   $noheb, 
                   '$montantarrhes', 
                   '$dateresa', 
                   NULL, 
                   $montantarrhes, 
                   $nbOccupant, 
                   $tarifsemresa)";

echo $sql;
    // Exécuter la requête SQL d'insertion
    $results = mysqli_query($idc, $sql);

    // Vérifier le résultat de l'insertion
    if ($results) {
        echo "Réservation effectuée avec succès !";
    } else {
        echo "Échec de l'insertion de la réservation : " . mysqli_error($idc);
    }
}

?>
    <footer>
        <p>&copy; 2023 Agence de Locations d'Appartement</p>
    </footer>
</body>
</html>


