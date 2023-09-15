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
                <li><a href="gestionnaire.html">Accueil</a></li>
                <li><a href="ajouthebergement.php">Hébergements</a></li>
                <li><a href="#">Événements</a></li>
                <li><a href="deconnexion.php">Déconnexion</a></li>
            </ul>
        </nav>
    </header>
    <h1 class="titre">Ajouter un hébergement</h1>
    <form action="ajouthebergement.php" method="POST">

    <form action="traitement.php" method="post" enctype="multipart/form-data">
        <!-- Numéro Hebergement -->
        Numéro Hebergement :
        <input type="text" name="numero" id="numero" required><br>

        <!-- Code de l'Hebergement -->
        Code de l'Hebergement :
        <select id="hebergement">
            <option value="appartement">appartement</option>
            <option value="bungalow">bungalow</option>
            <option value="mobil home">mobil home</option>
            <option value="chalet ">chalet </option>
            <option value="autres">autres</option>
        </select> <br>

        <!-- Nom de l'Hebergement -->
        Nom de l'Hebergement :
        <input type="text" name="nom" id="nom" required><br>

        <!-- Nombre de places -->
        Nombre de places :
        <input type="number" name="nombres" id="nombres" required><br>

        <!-- Surfaces de l'Hebergement -->
        Surfaces de l'Hebergement :
        <input type="number" name="surface" id="surface" required><br>

        <!-- Années d'Hebergement -->
        Années d'Hebergement :
        <input type="text" name="annees" id="annees" required><br>

        <!-- Secteur d'Hebergement -->
        Secteur d'Hebergement :
        <input type="text" name="secteur" id="secteur" required><br>

        <!-- Orientation de l'Hebergement -->
        Orientation de l'Hebergement :
        <input type="text" name="orientation" id="orientation" required><br>

        <!-- ETATHEB -->
        Etat de l'Hebergement :
        <input type="text" name="etat" id="etat" required><br>

        <!-- Desinscription de l'Hebergement -->
        Desinscription de l'Hebergement :
        <textarea name="description" id="description" rows="4"></textarea><br>

        <!-- Photo de l'hebergement -->
        Photo de l'hebergement :
        <input type="file" name="photo" id="photo" accept="image/*"><br>

        <!--  Tarif de l'Hebergement -->
        Tarif de l'Hebergement :
        <input type="number" name="tarif" id="tarif" required><br>

        <input type="submit" value="Ajouter Hébergement">
        <input type="reset" value="Annuler">
    </form>

    </form>

    <footer>
        <p>&copy; 2023 Agence de Locations d'Appartement</p>
    </footer>
    <?php
    if(!empty($_POST)){
        // connexion a la base de données
        include("bdd.php");
        // Récuperation des champs dans un formulaire
        $numero = $_POST["numero"];
        $code = $_POST["code"];
        $nom = $_POST["nom"];
        $nombres = $_POST["nombres"];
        $surface = $_POST["surface"];
        $annees = $_POST["annees"];
        $secteur = $_POST["secteur"];
        $orientation = $_POST["orientation"];
        $etat = $_POST["etat"];
        $description = $_POST["description"];
        $photo = $_POST["photo"];
        $tarif = $_POST["tarif"];
    
    if (mysqli_num_rows($verifieResult) > 0) {
        
    } else {
        // Préparation de la requête
        $requete = "INSERT INTO hebergement (NOHEB, CODETYPEHEB, NOMHEB, NBPLACEHEB, SURFACEHEB, ANNEEHEB, SECTEURHEB, ORIENTATIONHEB, ETATHEB, DESCRIHEB, PHOTOHEB, TARIFSEMHEB) VALUES ('$numero', '$code', '$nom', '$nombres', '$surface', '$annees', '$secteur', '$orientation', '$etat', '$description', '$photo', '$tarif')";
        
        // Exécution de la requête
        $resultat = mysqli_query($idc, $requete);
        
        if ($resultat) {
            header("location:gestionnaire.html");
        } else {
            echo "<p>Une erreur est survenue lors de l'ajout " . mysqli_error($idc) . "</p>";
        }
    }
        
        // Fermer la connexion à la base de données
        mysqli_close($idc);
    }

    ?>
</body>
</html>