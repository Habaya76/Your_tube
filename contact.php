<?php
require('header.php');

$date = new DateTime();
$email = $message = "";
$emailError = $messageError = "";
$isSuccess = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = verifyInput($_POST["email"]);
    $message = verifyInput($_POST["message"]);
    $isSuccess = true;

    if (empty($email)) {
        $emailError = "saisir email balala";
        $isSuccess = false;
    }
    if (empty($message)) {
        $messageError = 'veillez saissir un message';
        $isSuccess = false;
    }
    if ($isSuccess) {
        $db = new PDO('mysql:host=localhost;dbname=your_tube', 'root', 'root');
        //controler la connexion
        $resultats = $db->prepare("INSERT INTO `message` (`email`, `message`, `date`) values (:email, :message, :date)");
        $resultats->execute(['email' => $email, 'message' => $message, 'date' => $date->format('Y-m-d H:m:s')]);
    }
}
function isEmail($var)
{
    return filter_var($var, FILTER_VALIDATE_EMAIL);
}

// FONCTION POUR VERIFIER NOS INPUT
function verifyInput($var)
{
    $var = trim($var);              //enlever les space suplementaiere
    $var = stripslashes($var);      //enlever tout les anti_slass
    $var = htmlspecialchars($var); //securiter
    return $var;
}

?>
<main class="main_register">
    <div id="container">
        <form id="contact_form" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" role="form">
            <h2>Nous contactez</h2>
            <label classe="labelmail" for="email">E-mail*</label>
            <input type="text" id="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>">
            <p class="error"><?php echo $emailError; ?></p>
            <label class="labelmessage" for="message">Message*</label>
            <textarea name="message" id="message" cols="30" rows="10"><?php echo $message; ?></textarea>
            <p class="error"><?php echo $messageError; ?></p>
            <input type="submit" value="Envoyer" class="button">
            <p class="merci" style="display:<?php if ($isSuccess) echo 'block';
                                            else echo 'none'; ?>">votre message à bien été envoyé.Merci de m'avoir contacter :)</p>
        </form>
    </div>
</main>
<?php
require('footer.php');
?>