<?php
include_once('header.php');
session_start();

$pwdh = ['cost ' => 14];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

/* 
$idusers = $_GET['idusers']; */

$recup = $db->prepare("SELECT * FROM users where idusers = :idusers");
$recup->execute(['idusers' => $_SESSION['idusers']]);
$recupere = $recup->fetch();

if (isset($_POST['modifier'])) {
    // Réecriture des variables
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $idusers = $_SESSION['idusers'];
    // Requête de modification d'enregistrement
    $db = new PDO('mysql:host=localhost;dbname=your_tube', 'root', 'root');
    $Modifie_user = $db->prepare("UPDATE users SET nom = '$nom', prenom = '$prenom',  pseudo = '$pseudo', email = '$email', password = $hashed_password  WHERE idusers = $idusers");

    $Modifie_user->execute();
} // Fin du test isset

?>

<main class="main_register">

    <div id="container">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="form_inscription">
            <h1>Update_user</h1>
            <label for="">nom</label>
            <input type="text" name="nom" placeholder="votre nom" value="<?php echo $recupere['nom']; ?>">
            <p id="error"><?php echo $nomError; ?></p>

            <label for="">prenom</label>
            <input type="text" name="prenom" placeholder="votre prenom" value="<?php echo $recupere['prenom']; ?>">
            <p id="error"><?php echo $prenomError; ?></p>

            <label for="">Pseudo</label>
            <input type="text" name="pseudo" placeholder="votre pseudo" value="<?php echo $recupere['pseudo']; ?>">
            <p id="error"><?php echo $pseudoError; ?></p>

            <label for="">E-mail</label>
            <input type="text" name="email" placeholder="votre E-mail" value="<?php echo $recupere['email']; ?>">
            <p id="error"><?php echo $emailError; ?></p>

            <label for="">Mot de passe</label>
            <input type="password" name="password" placeholder="votre mot de passe" value="">
            <p id="error"><?php echo $passwordError; ?></p>

            <input name="modifier" type="submit" value="modifier" id="modifier">
            <p class="register"> <a href="register.php">Vous pouvez vous connecter ici</a>
        </form>
    </div>

</main>

<?php
require_once('footer.php');
?>