<?php
include_once('header.php');
include_once('fonction.php');

$pwdh = ['cost '=> 14];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
     
$nom = $prenom = $pseudo = $password = $email = "";
$nomError = $prenomError = $pseudoError = $passwordError = $emailError = $roleError = "";
$isValid = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = verifyInput($_POST["nom"]);
    $prenom = verifyInput($_POST["prenom"]);
    $pseudo = verifyInput($_POST["pseudo"]);
    $password = verifyInput($_POST["password"]);
    $email = verifyInput($_POST["email"]);
    $isValid = true;

    if (empty($nom)) {
        $nomError = "Le nom ne peut pas etre vide";
        $isValid = false;
    }
    if (empty($prenom)) {
        $prenomError = "Le prenom ne peut pas etre vide";
        $isValid = false;
    }
    if (empty($pseudo)) {
        $pseudoError = "Le pseudo ne peut pas etre vide";
        $isValid = false;
    }
    if (empty($email)) {
        $emailError = "Le mail ne peut pas etre vide";
        $isValid = false;
    }
    if (empty($password)) {
        $passwordError = "Le mot de passe ne peut pas etre vide";
        $isValid = false;
    }
    if ($isValid) {
        $db = new PDO('mysql:host=localhost;dbname=your_tube', 'root', 'root');
        $resultats = $db->prepare("INSERT INTO `users` ( `nom`, `prenom`, `pseudo`, `password`, `email`, `role`) values (:nom, :prenom, :pseudo, :password, :email, :role)");
        $resultats->execute(['nom' => $nom, 'prenom' => $prenom, 'pseudo' => $pseudo, 'password' => $hashed_password , 'email' => $email, 'role' => 'user']);
    }
}

?>
<main class="main_register">

    <div id="container">
        <form method="POST" action="" class="form_inscription">
            <h1>Inscription</h1>
            <label for="">nom</label>
            <input type="text" name="nom" placeholder="votre nom" value="">
            <p id="error"><?php echo $nomError; ?></p>

            <label for="">prenom</label>
            <input type="text" name="prenom" placeholder="votre prenom" value="">
            <p id="error"><?php echo $prenomError; ?></p>

            <label for="">Pseudo</label>
            <input type="text" name="pseudo" placeholder="votre pseudo" value="">
            <p id="error"><?php echo $pseudoError; ?></p>

            <label for="">E-mail</label>
            <input type="text" name="email" placeholder="votre E-mail" value="">
            <p id="error"><?php echo $emailError; ?></p>

            <label for="">Mot de passe</label>
            <input type="password" name="password" placeholder="votre mot de passe" value="">
            <p id="error"><?php echo $passwordError; ?></p>

            <input type="submit" name="bouton" value="Inscription">
            <p class="merci" style="display:<?php if ($isValid) echo 'block';
                                                else echo 'none'; ?>">Merci vous etes bien inscrit:)</p>
                <p class="register">Déjà inscrit?
                    <a href="login.php">Connectez-vous ici</a>
                </p>
        </form>
    </div>

</main>

<?php
require_once('footer.php');
?>