<?php
include_once('header.php');
?>
<div class="main_box">
   
<div class="box">
<div class="music_classique">
    <img src="./images/classique.jpg" alt="music_classique" width='350' height="300">
    <h2>Music Classiques</h2>
    <a href="classique.php"><button>Voir Plus </button></a>
</div>
<div class="music_hip_hop">
    <img src="./images/hip_hop.jpg" alt="music_hip_hop" width='350' height="300">
    <h2>Music Hip_hop</h2>
    <a href="hip_hop.php"><button>Voir Plus </button></a>
</div>
<div class="music_rb">
    <img src="./images/r&b.jpg" alt="music_r&b" width='350' height="300">
    <h2>Music R&B</h2>
    <a href="r&b.php"><button>Voir Plus </button></a>
</div>
</div>
<div class="box">
<div class="music_jazz">
    <img src="./images/jazz.jpg" alt="music_jazz" width='350' height="300">
    <h2>Music jazz</h2>
    <div class="button">
    <a href="jazz.php"><a href=""><button>Voir Plus </button></a></a>
    </div>
</div>

<div class="music_rock">
    <img src="./images/rock.jpg" alt="music_rock" width='350' height="300">
    <h2>Music Rock</h2>
    <a href="rock.php"><button>Voir Plus </button></a>
</div>
<div class="music_rap">
    <img src="./images/rap.jpg" alt="music_classique" width='350' height="300">
    <h2>Music Rap</h2>
    <a href="rap.php"><button>Voir Plus </button></a>
</div>

</div>
<div class="video_index">
<video width="820" height="440" controls>
  <source src="./images/video2.mp4" type="video/mp4">
  <source src="./images/video2.mp4" type="video/ogg">
Your browser does not support the video tag.
</video> 
</div>
</div>

<?php
require_once('footer.php');
?>