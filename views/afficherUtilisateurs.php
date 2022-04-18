<?PHP
	include "../controller/UtilisateurC.php";

	$utilisateurC=new UtilisateurC();
	$listeUsers=$utilisateurC->afficherUtilisateurs();

?>

<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Afficher Liste Utilisateurs </title>
    </head>
    <body>

		<button><a href="AjouterUtilisateur.php">Ajouter un Utilisateur</a></button>
     	<hr>
		<table border=1 align = 'center'>
			<tr>
				<th>Id</th>
				<th>Nom</th>
				<th>Prenom</th>
				<th>Email</th>
				<th>Login</th>
				<th>supprimer</th>
				<th>modifier</th>
			</tr>

			<?PHP
				foreach($listeUsers as $user){
			?>
				<tr>
					<td><?PHP echo $user['Id']; ?></td>
					<td><?PHP echo $user['Nom']; ?></td>
					<td><?PHP echo $user['Prenom']; ?></td>
					<td><?PHP echo $user['Email']; ?></td>
					<td><?PHP echo $user['Login']; ?></td>
					<td>
						<form method="POST" action="supprimerUtilisateur.php">
						<input type="submit" name="supprimer" value="supprimer">
						<input type="hidden" value=<?PHP echo $user['Id']; ?> name="id">
						</form>
					</td>
					<td>
						<a href="modifierUtilisateur.php?id=<?PHP echo $user['Id']; ?>"> Modifier </a>
					</td>
				</tr>
			<?PHP
				}
			?>
		</table>
	</body>
</html>
