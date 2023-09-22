<?php
include('bdd.php');
if(isset($_POST['submit'])){
    $numero = $_POST["numero"];
    $type = $_POST["type"];
    $nom = $_POST["nom"];
    $places = $_POST["places"];
    $surface = $_POST["surface"];
    $internet = isset($_POST["internet"]) ? 1 : 0; // Vérifier si la case à cocher Internet est cochée
    $annee = $_POST["annee"];
    $secteur = $_POST["secteur"];
    $orientation = $_POST["orientation"];
    $etat = $_POST["etat"];
    $description = $_POST["description"];
    $photo = $_POST["photo"];
    $tarif = $_POST["tarif"];

    
    $requete = "INSERT INTO hebergement VALUES ('$numero', '$type', '$nom', '$places', '$surface', '$internet', '$annee', '$secteur', '$orientation', '$etat', '$description', '$photo', '$tarif')";
    $result = mysqli_query($idc, $requete);
    


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Assurez-vous que le fichier a été correctement téléchargé
        if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
            // Chemin de destination où vous souhaitez enregistrer le fichier téléchargé sur le serveur
            $uploadDir = "chemin/vers/repertoire/de/destination/";
            $uploadPath = $uploadDir . $_FILES["photo"]["name"];
    
            // Déplacez le fichier téléchargé vers le répertoire de destination
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $uploadPath)) {
                // Le téléchargement du fichier a réussi, vous pouvez maintenant enregistrer le chemin dans la base de données.
                // Utilisez $uploadPath pour cela.
    
                // ...
    
                // Exemple de requête SQL pour insérer le chemin de l'image dans la base de données
                $requete = "INSERT INTO hebergement (NOHEB, CODETYPEHEB, NOMHEB, NBPLACEHEB, SURFACEHEB, INTERNET, ANNEEHEB, SECTEURHEB, ORIENTATIONHEB, ETATHEB, DESCRIHEB, PHOTOHEB, TARIFSEMHEB) VALUES ('$numero', '$type', '$nom', '$places', '$surface', '$internet', '$annee', '$secteur', '$orientation', '$etat', '$description', '$uploadPath', '$tarif')";
                $result = mysqli_query($idc, $requete);
    
                if ($result) {
                    header("location:gestionnaire.php");
                } else {
                    echo "<p>Une erreur est survenue lors de l'ajout : " . mysqli_error($idc) . "</p>";
                }
            }
        }
    }
}
    // Fermer la connexion à la base de données
    mysqli_close($idc);
    ?>