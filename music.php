<?php
require_once('header.php');
require_once('fonction.php');
$date = new DateTime();
$req = $db->prepare('SELECT * FROM article WHERE idarticle = :idarticle');
$req->execute(array('idarticle' => $_GET['idarticle']));
$resultat = $req->fetch();
$req = $db->prepare('SELECT * FROM article ');
$req->execute();
$resul = $req->fetch();

$idarticle = $_GET['idarticle'];
$idusers = $_SESSION['idusers'];

?>
<main id="main_recette">
    <section class="section_recette">
            <?php
            echo $resultat['titre'];
            ?>
        <h4>Music Classique</h4>

        <input type="submit" value="Ecouter">
    </section>
</main>

<?php
require('footer.php');
?>