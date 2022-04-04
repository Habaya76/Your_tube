<?php
require('header.php');
$date = new DateTime();
$req = $db->prepare('SELECT * FROM categorie ');
$req->execute();
$resultat = $req->fetchAll();

$idarticle = $_GET['idarticle'];
$recup = $db->query("SELECT * FROM article where idarticle = $idarticle");
$recupere = $recup->fetch();

// Réecriture des variables
if (isset($_POST['modifier'])) {

    // Réecriture des variables
    $idarticle = $_GET['idarticle'];
    $titre = $_POST['titre'];
    $image = $_POST['image'];
    $dateup = $date->format('Y-m-d H:m:s');


    // Requête de modification d'enregistrement
    $Modifierarticle = $db->prepare("UPDATE article SET titre = '$titre', image = '$image', date = '$dateup' WHERE idarticle = $idarticle");
    $Modifierarticle->execute();
} // Fin du test isset


?>
<main class="main_register">
    <div class="contenuAdmin">
        <form method="POST" action="">
            <label for="titre">Titre</label>
            <input name="titre" titre="text" value="<?php echo $recupere['titre'] ?>" placeholder="entre le titre de l'article">
            <label for="content">Image</label>
            <input name="image" titre="text" value="<?php echo $recupere['image'] ?>">
            <label for="categorie">Categorie</label>
            <select name="idcategorie">
                <?php
                for ($i = 0; $i < count($resultat); $i++) :
                ?>
                    <option value="<?php echo $resultat[$i]['idcategorie'] ?>"><?php echo $resultat[$i]['categorie'] ?></option>
                <?php endfor; ?>
            </select>
            <input name="modifier" type="submit" value="modifier" id="modifier">
        </form>
    </div>
</main>

<?php
require('footer.php');
?>