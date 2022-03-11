<form method = "POST" action = '?action=signup'>
	<h2> Inscription
		<h3> Pseudo
			<input type = "text" name = "login">
		</h3>
		<h3>Mot de passe
			<input type = "password" name = "password">
		</h3>
		<h3> Confirmer votre mot de passe
			<input type = "password" name = "confirmation">
		</h3>
	</h2>	
    <input type = "submit">
    <p><?php echo $data["result"]; ?></p>
</form>