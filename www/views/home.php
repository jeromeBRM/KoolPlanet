<p>Bienvenue</p>

<p>Coucou ! Voici la liste des utilisateurs :</p>

<?php

global $pdo;

$sql = $pdo->query("SELECT * FROM User");
$users = $sql ->FetchAll();
foreach($users as $user){
	echo $user["Login"];
}