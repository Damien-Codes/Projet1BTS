<html>
<body>
<?php
include("bdd.php");

if(isset($_GET['numero'])) {
    $c = $_GET['numero'];
    $requete = "DELETE FROM hebergement WHERE NOHEB = '$c'";

    $resultat = mysqli_query($idc, $requete);


    if (!$resultat) {
        echo "<center><h1>Echec de la suppression $requete</h1></center>";
        echo mysqli_error($idc);
    } else {
        if (mysqli_affected_rows($idc)) { 
            echo "<center><h1>Suppression effectuée</h1></center>";
            header("location: gestionnaire.php");
        } else {
            echo "<center><h1>Aucun enregistrement trouvé à supprimer.</h1></center>";
        }
    }

    mysqli_close($idc);
} else {
    echo "<center><h1>Aucune valeur NOHEB fournie.</h1></center>";
}
mysqli_close($idc);
?>
</body>
</html>