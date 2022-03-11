<form method="POST" action="?action=login">
	<h2>Connexion
		<h3>Nom d'utilisateur
			<input type="text" name="login">
		</h3>
		<h3>Mot de passe
			<input type="password" name="password">
		</h3>
	</h2>
	<p><?= $data["result"]; ?></p>
	<input type="submit">
</form>