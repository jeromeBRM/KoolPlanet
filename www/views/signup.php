<?php

if (isset($_SESSION["err"])){
	$err = $_SESSION["err"];
	unset($_SESSION["err"]);
}

if (isset($_POST["login"]) && isset($_POST["password"]) && isset($_POST["email"]) && isset($_POST["confirmation"])){

    // l'utilisateur a correctement saisi le formulaire

    $login = $_POST["login"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $confirmation = $_POST["confirmation"];

    if ($password == $confirmation){

        // l'utilisateur a correctement saisi son mot de passe

        global $pdo;

        $sql = $pdo->prepare(
            'INSERT INTO User VALUES (?, ?, ?)'
            );
        $sql->execute(array($login, $email, $password));

        echo "vous êtes inscrit !";
    }
    else{
        echo "veuillez confirmer votre mot de passe";
    }
}

else{
?>

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
<input type = "submit">
</form>
<?php } ?>

<?php if (isset ($err)) { ?>
<p> <?php echo $err ; ?> </p>
<?php } ?>