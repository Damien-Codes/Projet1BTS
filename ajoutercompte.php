<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ajoutercompte.css">
    <title>Tableau de bord - Admin</title>
</head>
<body>
    <header>
        <h1>Compte Utilisateurs</h1>
        <nav>
            <ul>
                <li><a href="admin.html">Accueil</a></li>
                <li><a href="#">Appartements</a></li>
                <li><a href="utilisateur.php">Utilisateurs</a></li>
                <li><a href="deconnexion.php">Déconnexion</a></li>
            </ul>
        </nav>
    </header>
    
    <h1 class="titre">Formulaire d'inscription</h1>
    <form action="" method="post">
        USER :<input type="text" name="user" id="user" required class="style1"><br>

        MDP :<input type="password" name="mdp" id="mdp" required class="style1"><br>

        NOMCPTE :<input type="text" name="nom" id="nom" required class="style1"><br>

        PRENOMCPTE :<input type="text" name="prenom" id="prenom" required class="style1"><br>

        DATEINSCRIP :<input type="date" name="dateinscrip" id="dateinscrip" required class="style1"><br>

        DATEFERME :<input type="date" name="dateferme" id="dateferme" class="style1"><br>

        <label for="typecompte">TYPECOMPTE :</label>
        <select name="typecompte" id="typecompte">
            <option value="admin">Admin</option>
            <option value="gestionnaire">Gestionnaire</option>
            <option value="vacancier">Vacancier</option>
        </select><br>

        ADRMAILCPTE :<input type="email" name="email" id="email" required class="style1"><br>

        NOTELCPTE :<input type="text" name="tel" id="tel" required class="style1"><br>

        NOPORTCPTE :<input type="text" name="port" id="port" class="style1"><br>

        <input type="submit" name="ajouter" value="Ajouter" class="style2">
        <input type="reset" value="Annuler" class="style2"><br>
    </form>

    <footer>
        <p>&copy; 2023 Agence de Locations d'Appartement</p>
    </footer>
    <?php
    if(!empty($_POST)){
        // connexion a la base de données
        include("bdd.php");
        // Récuperation des champs dans un formulaire
        $user = $_POST["user"];
        $mdp = $_POST["mdp"];
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $dateinscrip = $_POST["dateinscrip"];
        $dateferme = $_POST["dateferme"];
        $typecompte = $_POST["typecompte"];
        $email = $_POST["email"];
        $tel = $_POST["tel"];
        $port = $_POST["port"];
        // Vérifier si l'utilisateur existe déjà
    $verifie = "SELECT * FROM compte WHERE USER = '$user'";
    $verifieResult = mysqli_query($idc, $verifie);
    
    if (mysqli_num_rows($verifieResult) > 0) {
        
    } else {
        // Préparation de la requête
        $requete = "INSERT INTO compte (USER, MDP, NOMCPTE, PRENOMCPTE, DATEINSCRIP, DATEFERME, TYPECOMPTE, ADRMAILCPTE, NOTELCPTE, NOPORTCPTE) VALUES ('$user', '$mdp', '$nom', '$prenom', '$dateinscrip', '$dateferme', '$typecompte', '$email', '$tel', '$port')";
        
        // Exécution de la requête
        $resultat = mysqli_query($idc, $requete);
        
        if ($resultat) {
            header("location:utilisateur.php");
        } else {
            echo "<p>Une erreur est survenue lors de l'ajout : Utilisateur ou mot de passe déjà utilisé" . mysqli_error($idc) . "</p>";
        }
    }
        
        // Fermer la connexion à la base de données
        mysqli_close($idc);
    }

    ?>
</body>
</html>