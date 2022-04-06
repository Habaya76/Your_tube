<?php
require('header.php');

// $date = new DateTime();
// $req = $db->prepare('SELECT * FROM categorie ');
// $req->execute();
// $resultat = $req->fetchAll();

$recup = $db->prepare("SELECT * FROM article where idarticle = :idarticle");
$recup->execute(['idarticle' => $_SESSION['idarticle']]);
$recupere = $recup->fetch();
// Réecriture des variables
if (isset($_POST['suprimer'])) {

    // Réecriture des variables
    $idarticle = $_SESSION['idarticle'];
    $titre = $_POST['titre'];
    $image = $_POST['image'];
    $dateup = $date->format('Y-m-d H:m:s');


    // Requête de modification d'enregistrement
    $Modifierarticle = $db->prepare("DELETE FROM `article` where idarticle = $idarticle");
    $Modifierarticle->execute();
} // Fin du test isset



require('footer.php');
?>