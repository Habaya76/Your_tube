<?php
include_once('header.php');
$resultats = $db->query('SELECT * From article', PDO::FETCH_ASSOC);
?>
<div class="main_liste">

    <?php
    while ($row = $resultats->fetch()) :
    ?>
        <div class="box_liste">

            <div class="liste">
            </div>
            <a href="https://www.youtube.com/"> <img src="images/<?php echo $row['image']; ?>" width='30' height="30"></a>
            <?php
            echo $row['titre'];
            ?>
            </p>
        </div>
        <hr>
    <?php
    endwhile;
    ?>
</div>

</main>
<?php
require('footer.php');
?>