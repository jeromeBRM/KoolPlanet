<p>Bienvenue</p>

<p>Coucou ! Voici la liste des utilisateurs :</p>

<?php
$sql = $PDO ->query"SELECT * FROM users");
$user = $sql ->FetchAll()
foreach($users as $user){
		print_r($user);
		echo PHP_SQL;
}