<form method = "POST" action = '?action=signup'>
	<h1> Formulaire d'inscription
		<h3> Email
			<input type = "email" name = "email">
		</h3>
		<h3> Login
			<input type = "text" name = "login">
		</h3>

		<h3>Password
			<input type = "password" name = "password">
		</h3>

		<h3> Confirmation Passeword
			<input type = "password" name = "confirmation">
		</h3>
	</h1>	
<<<<<<< Updated upstream
    <input type = "submit">
</form>
<?php } ?>

<?php if (isset ($err)) { ?>
<p> <?php echo $err ; ?> </p>
<?php } ?>
=======
<input type = "submit">
</form>
>>>>>>> Stashed changes
