<?php
session_start();
include_once '../Model/Utilisateur.php';
include_once '../Controller/UtilisateurC.php';
$message="";
$userC = new UtilisateurC();
if (isset($_POST["email"]) &&
    isset($_POST["password"])) {
    if (!empty($_POST["email"]) &&
        !empty($_POST["password"]))
    {   $message=$userC->connexionUser($_POST["email"],$_POST["password"]);
         $_SESSION['e'] = $_POST["email"];// on stocke dans le tableau une colonne ayant comme nom "e",
        //  avec l'email à l'intérieur
        if($message!='pseudo ou le mot de passe est incorrect'){
           header('Location:ProfilUser.php');}
        else{
            $message='pseudo ou le mot de passe est incorrect';
        }}
    else
        $message = "Missing information";}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
</head>
<body>
<form name="frmUser" method="post" action="">
   <div class="message">
      <?php if($message!="") { echo $message; } ?>
    </div>
    <table border="0" cellpadding="10" cellspacing="1" width="500" align="center" class="tblLogin">
        <tr class="tableheader">
            <td align="center" colspan="2">Authentification</td>
        </tr>
        <tr class="tablerow">
            <td>
                <label for="email">Email:</label>
            </td>
            <td>
                <input type="text" name="email" placeholder="Email" class="login-input">
            </td>
        </tr>
        <tr class="tablerow">
            <td>
                <label for="password">Password:</label>
            </td>
            <td>
                <input type="password" name="password" placeholder="Password" class="login-input"></td>
        </tr>
        <tr class="tableheader">
            <td align="center" colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
        </tr>
    </table>
</form>
</body>
</html>