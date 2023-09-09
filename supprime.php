<html>
<body>
<?php
include("bdd.php");

if(isset($_GET['NOMCPTE'])) {
    $c = $_GET['NOMCPTE'];

    $requete = "DELETE FROM compte WHERE NOMCPTE = '$c'";

    $resultat = mysqli_query($idc, $requete);

    if (!$resultat) {
        echo "<center><h1>Echec de la suppression $requete</h1></center>";
        echo mysqli_error($idc);
    } else {
        if (mysqli_affected_rows($idc)) { 
            echo "<center><h1>Suppression effectuée</h1></center>";
            header("location:utilisateur.php");
        } else {
            echo "<center><h1>Aucun enregistrement trouvé à supprimer.</h1></center>";
        }
    }

    mysqli_close($idc);
} else {
    echo "<center><h1>Aucune valeur NOMCPTE fournie.</h1></center>";
}
?>
</body>
</html>