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
        Choisir le type de compte : 
        <label for="">
        <option value="Admin">Admin</option>
        <option value="Vacancier">Vacancier</option>
        <option value="Location">Gestionnaire de Location</option>
        </label> <br>
        <!-- Bouton qui envoie les information a la bdd -->
        <input type="submit" value="Connexion" class="style2">
        <!-- Bouton qui enlève toutes les information du formulaire -->
        <input type="reset" value="Annuler" class="style2"><br>
        </div></center>
    </form>


<?php

// Inclure le fichier de connexion à la base de données
include("bdd.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupération de user et mdp dans le formulaire
    $a = $_POST["user"];
    $b = $_POST["mdp"];

    // Utilisation de mysqli_real_escape_string pour échapper les données (attention, ce n'est pas aussi sûr que les requêtes préparées)
    $a = mysqli_real_escape_string($idc, $a);
    $b = mysqli_real_escape_string($idc, $b);

    // Requête SQL
    $requete = "SELECT * FROM compte WHERE user = '$a' AND mdp = '$b'";
    $resultat = mysqli_query($idc, $requete);
    $ligne = mysqli_num_rows($resultat);

    if ($ligne == 1) {
        // La connexion est réussie
        $_SESSION["user"] = $a;
        $_SESSION["mdp"] = $b;
        header("location:index.html");
        exit();
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