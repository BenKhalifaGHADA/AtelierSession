<?php
    include "../controller/UtilisateurC.php";
    include_once '../Model/Utilisateur.php';

	$utilisateurC = new UtilisateurC();
	$error = "";

	if (
        isset($_POST["nom"]) && 
        isset($_POST["prenom"]) &&
        isset($_POST["email"]) && 
        isset($_POST["login"]) && 
        isset($_POST["pass"])
    ){
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
            
            $utilisateurC->modifierUtilisateur($user, $_GET['id']);
            //header('Location:afficherUtilisateurs.php');
        }
        else
            $error = "Missing information";
	}

?>
<html>
	<head>
		<title>Modifier Utilisateur</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<button><a href="afficherUtilisateurs.php">Retour à la liste</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
		
		<?php
			if (isset($_GET['id'])){
				$user = $utilisateurC->recupererUtilisateur1($_GET['id']);
				
		?>
		<form action="" method="POST">
            <table align="center">
                <tr>
                    <td rowspan='3' colspan='1'>Fiche Personnelle</td>
                    <td>
                        <label for="nom">Nom:
                        </label>
                    </td>
                    <td><input type="text" name="nom" id="nom" maxlength="20" value = "<?php echo $user->Nom; ?>"></td>
                </tr>
                <tr>
                    <td>
                        <label for="prenom">Prénom:
                        </label>
                    </td>
                    <td><input type="text" name="prenom" id="prenom" maxlength="20" value = "<?php echo $user->Prenom; ?>"></td>
                </tr>
                
                <tr>
                    <td>
                        <label for="email">Adresse mail:
                        </label>
                    </td>
                    <td>
                        <input type="email" name="email" id="email" pattern=".+@gmail.com|.+@esprit.tn" value = "<?php echo $user->Email; ?>">
                    </td>
                </tr>
                <tr>
                    <td rowspan='2' colspan='1'>Information de Connexion</td>
                    <td>
                        <label for="login">Login:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="login" id="login" value = "<?php echo $user->Login; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="pass">Mot de passe:
                        </label>
                    </td>
                    <td>
                        <input type="password" name="pass" id="pass" value = "<?php echo $user->Password; ?>">
                    </td>
                </tr>
                
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Modifier" name = "modifer"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
		<?php
		}
		?>
	</body>
</html>