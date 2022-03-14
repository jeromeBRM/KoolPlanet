<form method="POST" action="?action=login">
	<h2 class = "container__identification">Connexion
		<h4>Nom d'utilisateur</h4>
			<input type="text" name="login">
		<h4>Mot de passe</h4>
			<input type="password" name="password">
	</h2>
	<p><?= $data["result"]; ?></p>
	<input type="submit" value = "Connexion">
</form>