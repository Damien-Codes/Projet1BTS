<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ajouthebergement.css">
    <title>Tableau de bord - Hebergement</title>
</head>
<body>
    <header>
        <h1>Ajouter un Hebergement</h1>
        <nav>
            <ul>
                <li><a href="gestionnaire.php">Accueil</a></li>
                <li><a href="ajouthebergement.php">Hébergements</a></li>
                <li><a href="#">Événements</a></li>
                <li><a href="deconnexion.php">Déconnexion</a></li>
            </ul>
        </nav>
    </header>
    <h1 class="titre">Ajouter un hébergement</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <!-- Numéro Hebergement -->
        Numéro Hebergement :
        <input type="number" name="numero" required><br>

        <!-- Code de l'Hebergement -->
        Code de l'Hebergement :
        <select name="type">
            <option value="1">Appartement</option>
            <option value="2">Bungalow</option>
            <option value="3">Mobil Home</option>
            <option value="4">Chalet</option>
            <option value="5">Autres</option>
        </select> <br>

        <!-- Nom de l'Hebergement -->
        Nom de l'Hebergement :
        <input type="text" name="nom" required><br>

        <!-- Nombre de places -->
        Nombre de places :
        <input type="number" name="places" required><br>

        <!-- Surfaces de l'Hebergement -->
        Surfaces de l'Hebergement :
        <input type="number" name="surface" required><br>

        <!-- Internet -->
        Internet :
        <input type="checkbox" name="internet"><br>

        <!-- Années d'Hebergement -->
        Années d'Hebergement :
        <input type="number" name="annee" required><br>

        <!-- Secteur d'Hebergement -->
        Secteur d'Hebergement :
        <input type="text" name="secteur" required><br>

        <!-- Orientation de l'Hebergement -->
        Orientation de l'Hebergement :
        <input type="text" name="orientation" required><br>

        <!-- ETATHEB -->
        Etat de l'Hebergement :
        <select name="etat">
            <option value="Disponible">Disponible</option>
            <option value="Indisponible">Indisponible</option>
        </select> <br>

        <!-- Desinscription de l'Hebergement -->
        Description de l'Hebergement :
        <textarea name="description" rows="4"></textarea><br>

        <!-- Photo de l'hebergement -->
        Photo de l'hebergement :
        <input type="file" name="picture" accept="image/*"><br>

        <!--  Tarif de l'Hebergement -->
        Tarif de l'Hebergement :
        <input step="0.01" type="number" name="tarif" required><br>

        <input type="submit" name="submit" value="Ajouter Hébergement">
        <input type="reset" value="Annuler">
    </form>

    <footer>
        <p>&copy; 2023 Agence de Locations d'Appartement</p>
    </footer>
    <?php
    if (isset($_POST['submit'])){
        include('bdd.php');
    
        $numero = $_POST["numero"];
        $type = $_POST["type"];
        $nom = $_POST["nom"];
        $places = $_POST["places"];
        $surface = $_POST["surface"];
        $internet = $_POST["internet"] ? 1 : 0; // Vérifier si la case à cocher Internet est cochée
        $annee = $_POST["annee"];
        $secteur = $_POST["secteur"];
        $orientation = $_POST["orientation"];
        $etat = $_POST["etat"];
        $description = $_POST["description"];
        $uuid = uniqid();
        $extension = pathinfo($_FILES["picture"]['name'], PATHINFO_EXTENSION);
        $imgName = strtolower($uuid . '.' . $extension);
        $tarif = $_POST["tarif"];
        
        $path = './img/';
        $destinationPath = $path . $imgName;

        try {

            if (move_uploaded_file($_FILES["picture"]['tmp_name'], $destinationPath)) {
                
            }
            else{
                echo "error files";
            }
            
        }
        catch(Exeption $e){
            die($e);
        }

        

        $requete = "INSERT INTO hebergement (NOHEB, CODETYPEHEB, NOMHEB, NBPLACEHEB, SURFACEHEB, INTERNET, ANNEEHEB, SECTEURHEB, ORIENTATIONHEB, ETATHEB, DESCRIHEB, PHOTOHEB, TARIFSEMHEB) 
                                    VALUES  ('$numero', '$type', '$nom', '$places', '$surface', '$internet', '$annee', '$secteur', '$orientation', '$etat', '$description', '$imgName', '$tarif')";
        $result = mysqli_query($idc, $requete);
        
    


        if ($result) {
            echo "<h1>Hebergement ajouter</h1>";
            header( "Refresh:5; url=gestionnaire.php");
        } else {
            echo "<p>Une erreur est survenue lors de l'ajout : " . mysqli_error($idc) . "</p>";
        }
    
        // Fermer la connexion à la base de données
        mysqli_close($idc);
    }
    else{
        echo "";
    }
    ?>
</body>
</html>