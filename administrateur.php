<?php
require_once('header.php');
$resultats = $db->query('SELECT * FROM `article` INNER JOIN categorie On categorie.idcategorie = article.idcategorie ', PDO::FETCH_ASSOC);
$resu = $resultats->fetchAll();

?>

<main class="main_register">

  <div class="contenuAdmin">
    <h2> Manager </h2>
    <button action="ajout" class="button"><a class="ajou" href="ajout.php">Ajouter music</a></button>
    <table>

      <tr>
        <td> Id</td>
        <td name="Nom">Titre</td>
        <td name="category">Catégorie</td>
        <td>Action
        </td>
      </tr>

      <?php
      for ($i = 0; $i < count($resu); $i++) :
      ?>

        <tr>
          <td name="idArticle"><?php echo $resu[$i]['idarticle'] ?></td>
          <td name="Nom"><?php echo $resu[$i]['titre'] ?></td>
          <td name="category"><?php echo $resu[$i]['categorie'] ?></td>
          <td>

            <button action="ModiferArticle" class="button"><a class="ajou" href="modifier.php?idarticle=<?php echo $resu[$i]['idarticle']; ?>">Modifier</a></button>
            <button action="Supprime" class="button" name="suprimer" value="<?php echo $resu[$i]['idarticle'];?>"><a class="ajou" href="#">Suprimer</a></button>

          </td>
        </tr>
      <?php
      endfor;
      ?>
    </table>
  </div>
</main>
<?php
require('footer.php');
?>