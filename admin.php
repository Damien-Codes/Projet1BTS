<?php
session_start();
if(isset($_SESSION["user"]) == False)
    header("location:index.html");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Tableau de bord - Accueil</title>
</head>
<body>
    <header>
        <h1>Tableau de bord - Admin</h1>
        <nav>
            <ul>
                <li><a href="admin.html">Accueil</a></li>
                <li><a href="#">Appartements</a></li>
                <li><a href="utilisateur.php">Utilisateurs</a></li>
                <li><a href="deconnexion.php">Déconnexion</a></li>
            </ul>
        </nav>
    </header>
    <title>Tableau de bord - Admin</title>

    <section class="content">
        <h2>Bienvenue</h2>

      <?php
        echo $_SESSION["user"];
    ?>  
        <p>Vous êtes connecté en tant qu'administrateur. Vous pouvez gérer les appartements et les utilisateurs.</p>
    </section>

    <footer>
        <p>&copy; 2023 Agence de Locations d'Appartement</p>
    </footer>
</body>
</html>
