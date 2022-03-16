<form method="POST" action="?action=login">
	<div class = "container__identification">
		<p>Nom d'utilisateur</p>
			<input type="text" name="login">
		<p>Mot de passe</p>
			<input type="password" name="password">
	<p><?= $data["result"]; ?></p>
	<input type="submit" value = "Connexion">
	</div>
</form>