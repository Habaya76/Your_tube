<?php
$db = new PDO('mysql:host=localhost;dbname=your_tube', 'root', 'root');
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your_tube</title>
    <script src="https://kit.fontawesome.com/f00c55aea5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./CSS/style.css">
</head>
<header>
    <nav>
        <ul>
            <li><a href="index.php">Acceuil</a></li>

            <li><a href="liste_musics.php">Bibliothéques</a></li>
            <li><a href="contact.php">Contact</a></li>

            <?php
            if (isset($_SESSION['role'])) {
                if ($_SESSION['role'] == 'user') {
                    echo  '<li><a href="Logout.php">Logout</a></li>';
                } elseif ($_SESSION['role'] == 'Administrateur') {
                    echo  ' <li><a href="Administrateur.php">Administrateur</a></li>';
                    echo  '<li><a href="Logout.php">Logout</a></li>';
                    echo '<li><a href="modif_user.php">Update_user</a></li>';
                }
            } else {
                echo '<li><a href="login.php">Login</a></li>';
            }
            ?>
        </ul>
    </nav>

</header>

<body>