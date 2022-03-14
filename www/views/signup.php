<form method = "POST" action = '?action=signup'>
	<div class = "container__identification">
		<p> Pseudo </p>
			<input type = "text" name = "login">
		<p>Mot de passe</p>
			<input type = "password" name = "password">
		<p> Confirmer le mot de passe</p>
			<input type = "password" name = "confirmation">
    	<input type = "submit" value = "Inscription">
	</div>	
    <p><?php echo $data["result"]; ?></p>
</form>