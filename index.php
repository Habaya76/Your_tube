<?php
include_once('header.php');
$resultats = $db->query('SELECT * From article', PDO::FETCH_ASSOC);
?>
<div class="video_index">
        <video width="820" height="540" controls>
            <source src="./images/video2.mp4" type="video/mp4">
            <source src="./images/video2.mp4" type="video/ogg">
            Your browser does not support the video tag.
        </video>
    </div>
    
<div class="main_box">
    
    <?php
    while ($row = $resultats->fetch()) :
       
    ?>
        <div class="box">

            <div class="music_classique">
                <img src="images/<?php echo $row['image']; ?>" width='350' height="300">
                <h2>Music</h2>
                <?php
                echo $row['titre'];
                ?>
                </p>
                <a href="https://www.youtube.com/"><button>Ecouter</button></a>
            </div>
        </div>
    <?php
    endwhile;
    ?>
</div>

<?php
require_once('footer.php');
?>