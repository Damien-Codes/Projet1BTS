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
    <link rel="stylesheet" href="vacanciers.css">
    <title>Tableau de bord - Vancancier</title>
</head>
<body>
    <header>
        <h1>Tableau de bord - Vancancier</h1>
        <nav>
            <ul>
                <li><a href="vacanciers.php">Accueil</a></li>
                <li><a href="hebergementvacancier.php">Voir les Hébergements</a></li>
                <li><a href="reservationvacancier.php">Réservations</a></li>
                <li><a href="deconnexion.php">Déconnexion</a></li>
            </ul>
        </nav>
        <hr>
        <h1>Bienvenue sur notre site de locations de vacances</h1>
    </header>


    <div class="container">
        <h2>Découvrez nouvelles offres de locations</h2>

        <div class="card">
            <h3>Appartement de luxe</h3>
            <p>Profitez du confort et du luxe dans nos appartements de standing. Vue panoramique sur la mer, cuisine équipée, piscine privée, tout est prévu pour des vacances inoubliables.</p>
        </div>

        <div class="card">
            <h3>Mobil Home</h3>
            <p>Profitez du confort dans nos Mobil-homes. Vue panoramique sur la mer, cuisine équipée, piscine privée, tout est prévu pour des vacances inoubliables.</p>
        </div>

        <div class="card">
            <h3>Chalet en montagne</h3>
            <p>Évadez-vous en montagne dans notre chalet en bois. Cheminée, jacuzzi, et accès direct aux pistes de ski vous attendent pour des vacances au calme et en pleine nature.</p>
        </div>

        <div class="card">
            <h3>Bungalow en bord de plage</h3>
            <p>Relaxez-vous sur la plage dans notre bungalow en bord de mer. Plage de sable fin, eau turquoise, et couchers de soleil à couper le souffle vous garantissent des vacances paradisiaques.</p>
        </div>
    </div>

    <form action="" method="Get">
        <input type="search" name="terme" placeholder="Recherche...">
        <input type="submit" name="s" value="Rechercher">
    </form>

    <?php
    include("bdd.php");

    
    $query = "SELECT * FROM hebergement WHERE `NOMHEB` LIKE ?";
    $result = mysqli_query($idc, $query);


    if ($result->num_rows == 0) {
        echo "<p>Aucun résultat trouvé</p>";
    } else {
        while ($result = $result->fetch_assoc()) {
            echo "<p>" . $row["NOMHEB"] . "</p>";
        }
    }


    mysqli_close($idc);
?>

    <footer>
        <p>&copy; 2023 Agence de Locations d'Appartement</p>
    </footer>
</body>
</html>
