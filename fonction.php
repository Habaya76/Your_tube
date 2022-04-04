<?php
$pwdh = ['cost '=> 14];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
      
function verifyInput($var)
{
    $var = trim($var);              //enlever les space suplementaiere
    $var = stripslashes($var);      //enlever tout les anti_slass
    $var = htmlspecialchars($var); //securiter
    return $var;
}

function isEmail($var)
{
    return filter_var($var, FILTER_VALIDATE_EMAIL);
}

?>

<?php

if (isset($_POST['submitmaj'])) {
    $pseudo = $_POST['pseudo'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];

    $update = $db->prepare("UPDATE user SET prenom= :prenom, nom= :nom, pseudo= :pseudo, email= :email WHERE id_user= :id_user");
    $update->bindParam(':id_user', $_SESSION["id_user"]);
    $update->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $update->bindParam(':nom', $nom, PDO::PARAM_STR);
    $update->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $update->bindParam(':email', $email, PDO::PARAM_STR);
    $update->execute();

    if ($update) {
        echo "<script>alert(\"Vos information a bien était modifier\")</script>";
    } else {
        echo "<script>alert(\"Erreur veuillez réeseyer\")</script>";
    }
    
}



if (isset($_POST['submitpass'])) {
    $password = $_POST['password'];
    $param_passwords = password_hash($password, PASSWORD_DEFAULT);
    if ($_POST['password'] === $_POST['password_verif']) {
        $update1 = $db->prepare("UPDATE user SET password= :password WHERE id_user= :id_user");
        $update1->bindParam(':id_user', $_SESSION["id_user"]);
        $update1->bindParam(':password', $param_passwords, PDO::PARAM_STR);
        $update1->execute();

        if ($update1) {
            echo "<script>alert(\"Vos information a bien était modifier\")</script>";
        } else {
            echo "<script>alert(\"Erreur veuillez réeseyer\")</script>";
        }
    }
}




?>