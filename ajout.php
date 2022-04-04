<?php
require('header.php');
require_once('fonction.php');

$req = $db->prepare('SELECT * FROM categorie ');
$req->execute();
$resultat = $req->fetchAll();


$titre = $contenues = $categorie = "";
$titreError = $contenuesError = $image = "";
$isSuccess = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = verifyInput($_POST["titre"]);
    $idcategorie = verifyInput($_POST['idcategorie']);
    $image = verifyInput($_POST['image']);
    $idusers = $_SESSION['idusers'];
    $isSuccess = true;

    if (empty($titre)) {
        $titreError = "le titre ne peut pas etre vide";
        $isSuccess = false;
    }
    if (empty($image)) {
        $imageError = "l'image ne peut pas etre vide";
        $isSuccess = false;
    }

    if ($isSuccess) {
        // la connexion basse de donnees
        $db = new PDO('mysql:host=localhost;dbname=your_tube', 'root', 'root');
        $resultats = $db->prepare("INSERT INTO `article`(`titre`, `image`, `idcategorie`, `idusers`) values (:titre, :image, :idusers, :idcategorie)");
        $resultats->execute(['titre' => $titre, 'image' => $image, 'idcategorie' => $idcategorie, 'idusers' => $idusers]);
    }
}
// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['screenshot']) && $_FILES['screenshot']['error'] == 0) {
    // Testons si le fichier n'est pas trop gros
    if ($_FILES['screenshot']['size'] <= 1000000) {
        // Testons si l'extension est autorisée
        $fileInfo = pathinfo($_FILES['screenshot']['name']);
        $extension = $fileInfo['extension'];
        $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png','webp'];
        if (in_array($extension, $allowedExtensions)) {
            // On peut valider le fichier et le stocker définitivement
            move_uploaded_file($_FILES['screenshot']['tmp_name'], './images/' . basename($_FILES['screenshot']['name']));
            // echo "L'envoi a bien été effectué !";
        }
    }
}
?>

<main class="main_register">
    <div class="contenuAdmin">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" >
            <label for="titre">Titre</label>
            <input name="titre" type="text" value="<?php echo $titre; ?>" placeholder="entre le titre de l'article">
            <p class="error"><?php echo $titreError; ?></p>

            <label for="content">Image</label>
            <input name="image" type="text" value="<?php echo $image; ?>">
            <p class="error"><?php echo $imageError; ?></p>

            <label for="categorie">Categorie</label>

            <select name="idcategorie">
                <?php
                for ($i = 0; $i < count($resultat); $i++) :
                ?>
                    <option value="<?php echo $resultat[$i]['idcategorie'];?>"><?php echo $resultat[$i]['categorie'];?></option>
                <?php endfor; ?>
            </select>
            <button class="button">Creer</button>
            <p class="merci" style="display:<?php if ($isSuccess) echo 'block';
                                            else echo 'none'; ?>">La music a été Ajouter:)</p>
        </form>
        <form action="ajout.php" method="POST" enctype="multipart/form-data">
            <!-- Ajout des champs email et message -->
            <!-- Ajout champ d'upload ! -->
            <div class="mb-3">
                <label for="screenshot" class="form-label"></label>
                <input type="file" class="form-control" id="screenshot" name="screenshot" />
            </div>
            <!-- Fin ajout du champ -->
            <button name="screenshot" type="submit" class="button">Envoyer</button>
        </form>
    </div>

</main>

<?php
require('footer.php');
?>