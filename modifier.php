<html>
<body>
<?php
include("bdd.php");

if (isset($_POST["modifier"])) {
    $id = $_POST["Id"];
    $especes = $_POST["Especes"];
    $sexe = $_POST["Sexe"];
    $pseudo = $_POST["Pseude"];
    $date_naissance = $_POST["date_naissance"];
    $Commentaire = $_POST["Commentaire"];

    $query = "UPDATE animaux SET id='$id', especes='$especes', sexe='$sexe', pseudo='$pseude' date_naissance='$date_naissance',  commentaire='$Commentaire' WHERE id='$id'";
    if (mysqli_query($con, $query)) {
        echo "Modification effectuée avec succès";
    } else {
        echo "Erreur SQL : " . mysqli_error($con);
    }
}



if(isset($_GET['NOMCPTE'])) {
    $c = $_GET['NOMCPTE'];

    $requete = "UPDATE FROM compte WHERE NOMCPTE = '$c'";

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