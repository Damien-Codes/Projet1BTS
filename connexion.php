<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="connexion.css">
    <title>Connexion</title>
</head>
<body>
    <!-- lien redirection vers index.html -->
    <a href="index.html">Retour à l'Accueil</a>
    <center><h1>Se connecter</h1></center>

    <!-- Formulaire avec les informations que l'on prend pour les mettre dans la base de données -->
    <form action="connexion.php" method="post">
        <center><div>
        <!-- Champs du formulaire nom d'utilisateur -->
        Saisir un nom d'utilisateur :<input type="text" name="user" class="style1"><br>
        <!-- Champs du formulaire mot de passe -->
        Saisir un mot de passe :<input type="password" name="mdp" class="style1"><br>
        <!-- Bouton qui envoie les information a la bdd -->
        <input type="submit" value="Connexion" class="style2">
        <!-- Bouton qui enlève toutes les information du formulaire -->
        <input type="reset" value="Annuler" class="style2"><br>
        </div></center>
    </form>
</body>
</html>
<?php
session_start();

include("bdd.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $a = $_POST["user"];
    $b = $_POST["mdp"];

    $a = mysqli_real_escape_string($idc, $a);
    $b = mysqli_real_escape_string($idc, $b);

    $requete = "SELECT * FROM compte WHERE user = '$a' AND mdp = '$b'";
    $resultat = mysqli_query($idc, $requete);
    $ligne = mysqli_num_rows($resultat);

    if ($ligne == 1) {
        // La connexion est réussie
        $row = mysqli_fetch_assoc($resultat);
        $_SESSION["user"] = $a;
        $_SESSION["mdp"] = $b;

        // Vérifier le type de compte et rediriger en conséquence
        $typeCompte = $row["TYPECOMPTE"];
        if ($typeCompte == "adm") {
            header("location: admin.html");
        } elseif ($typeCompte == "vac") {
            header("location: vacanciers.php");
        } elseif ($typeCompte == "ges") {
            header("location: gestionnaire.html");
        } else {
            // Type de compte non géré, gérer en conséquence
            echo "Type de compte non pris en charge.";
        }
    } else {
        // La connexion a échoué
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }

    // Fermer la connexion à la base de données
    mysqli_close($idc);
}
?>