<?php
include_once '../Model/Utilisateur.php';
include_once '../Controller/UtilisateurC.php';

$error = "";

// create user
$user = null;

// create an instance of the controller
$userC = new UtilisateurC();
if (
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["email"]) &&
    isset($_POST["login"]) &&
    isset($_POST["pass"])
) {
    if (
        !empty($_POST["nom"]) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["login"]) &&
        !empty($_POST["pass"])
    ) {
        $user = new Utilisateur(
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['login'],
            $_POST['pass']
        );
        $userC->ajouterUtilisateur($user);
        header('Location:afficherUtilisateurs.php');
    }
    else
        $error = "Missing information";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>
<body>
<button><a href="afficherUtilisateurs.php">Retour à la liste</a></button>
<hr>

<div id="error">
    <?php echo $error; ?>
</div>

<form action="" method="POST">
    <table border="1" align="center">

        <tr>
            <td rowspan='3' colspan='1'>Fiche Personnelle</td>
            <td>
                <label for="nom">Nom:
                </label>
            </td>
            <td><input type="text" name="nom" id="nom" maxlength="20"></td>
        </tr>
        <tr>
            <td>
                <label for="prenom">Prénom:
                </label>
            </td>
            <td><input type="text" name="prenom" id="prenom" maxlength="20"></td>
        </tr>

        <tr>
            <td>
                <label for="email">Adresse mail:
                </label>
            </td>
            <td>
                <input type="email" name="email" id="email" pattern=".+@gmail.com|.+@esprit.tn">
            </td>
        </tr>
        <tr>
            <td rowspan='2' colspan='1'>Information de Connexion</td>
            <td>
                <label for="login">Login:
                </label>
            </td>
            <td>
                <input type="text" name="login" id="login" >
            </td>
        </tr>
        <tr>
            <td>
                <label for="pass">Mot de passe:
                </label>
            </td>
            <td>
                <input type="password" name="pass" id="pass">
            </td>
        </tr>

        <tr>
            <td></td>
            <td>
                <input type="submit" value="Envoyer">
            </td>
            <td>
                <input type="reset" value="Annuler" >
            </td>
        </tr>
    </table>
</form>
</body>
</html>