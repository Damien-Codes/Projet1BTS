<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="connexion.css">
    <title>Connexion</title>
</head>
<?php
session_start();
?>
<body>
    <!-- lien redirection vers index.html -->
    <a href="index.html">Retour à l'Accueil</a>
    <center><h1>Se connecter</h1></center>

    <!-- Formulaire avec les informations que l'on prend pour les mettre dans la base de donnée -->
    <form action="connexion.php" method="post">
        <center><div>
        <!-- Champs du formulaire nom d'utilisateur -->
        Saisir un nom d'utilisateur :<input type="text" name="user" class="style1"><br>
        <!-- Champs du formulaire mot de passe -->
        Saisir un mot de passe :<input type="password" name="mdp" class="style1"><br>
        <!-- Champs du formulaire type de compte -->
        
        <label for="type">
            <select name="type">
                <option value="adm" selected>Admin</option>
                <option value="ges">gestionnaire</option>
                <option value="vac">Vacancier</option>
            </select> <br>
        </label>
        <!-- Bouton qui envoie les information a la bdd -->
        <input type="submit" value="Connexion" class="style2">
        <!-- Bouton qui enlève toutes les information du formulaire -->
        <input type="reset" value="Annuler" class="style2"><br>
        </div></center>
    </form>


<?php

include("bdd.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupération de user et mdp dans le formulaire
    $a = $_POST["user"];
    $b = $_POST["mdp"];
    $type = $_POST["type"];

    // Utilisation de mysqli_real_escape_string pour échapper les données (attention, ce n'est pas aussi sûr que les requêtes préparées)
    $a = mysqli_real_escape_string($idc, $a);
    $b = mysqli_real_escape_string($idc, $b);


    // Requête SQL
    $requete = "SELECT * FROM compte WHERE user = '$a' AND mdp = '$b' AND TYPECOMPTE = '$type'";
    $resultat = mysqli_query($idc, $requete);
    $ligne = mysqli_num_rows($resultat);

    if ($ligne == 1) {
        // La connexion est réussie
        $_SESSION["user"] = $a;
        $_SESSION["mdp"] = $b;
        $_SESSION["type"] = $type;

        // Vérifie le type de compte de l'utilisateur
        switch ($_POST['type']) {
          case 'adm':
            // L'utilisateur est un administrateur
            header("location:admin.html");
            exit();
          case 'ges':
            // L'utilisateur est un gestionnaire
            header("location:gestionnaire.php");
            exit();
          case 'vac':
            // L'utilisateur est un vacancier
            header("location:vacanciers.php");
            exit();
          default:
            // Le type de compte n'est pas reconnu
            echo "<p>Erreur : le type de compte n'est pas reconnu.</p>";
        }
    } else {
        // La connexion a échoué
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
    

    // Fermer la connexion à la base de données
    mysqli_close($idc);
}
?>
</body>
</html>