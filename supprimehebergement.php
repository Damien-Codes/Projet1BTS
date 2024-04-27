<html>
<body>
<?php
include("bdd.php");

if(isset($_GET['numero'])) {
    $c = $_GET['numero'];

    $requete = "DELETE FROM hebergement WHERE NOHEB = '$c'";

    $resultat = mysqli_query($idc, $requete);

    if ($resultat) {
        echo "<h1>Hebergement Supprimer</h1>";
        header( "Refresh:2; url=gestionnaire.php");
    } else {
        echo "<p>Une erreur est survenue lors de l'ajout : " . mysqli_error($idc) . "</p>";
    }

    mysqli_close($idc);
} else {
    echo "<center><h1>Aucune valeur NOHEB fournie.</h1></center>";
}
?>
</body>
</html>