<?php
require('header.php');

$req = $db->prepare('SELECT * FROM article');
        $req->execute();
        $resultats = $req->fetchAll();
        var_dump($resultats);

?>
<main class="main_listerecettes">
    <div class="info_article">
        <?php
        while ($row = $resultats->fetch()) :
        ?>
            <img src="./images/<?php echo $row['image']; ?>">

            <ul class="info">
                <li><i class="fa-solid fa-user"></i> Habaya</li>
                <li>Le 22/03/2022</li>
                <li>Plat</li>
            </ul>
            <p>

                nisi rerum eos quaerat?<?php
                  echo $row['image'];
                                        ?>
         </p>

            <button type="submit" action="voir" class="button_liste"><a class="voir" href="music.php?idarticle=<?php echo $row['idarticle']; ?> ">Voir plus</a></button>
            <hr>
            <i class="fa-solid fa-message"></i>


    </div>


</main>
<?php
require('footer.php');
?>