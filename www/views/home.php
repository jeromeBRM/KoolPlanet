<p>Bienvenue</p>

<p>Coucou ! Voici la liste des utilisateurs :</p>

<ul>

<?php

global $pdo;

$sql = $pdo->query("SELECT * FROM User");
$users = $sql ->FetchAll();
foreach($users as $user){
?>
<li>
    <?php echo $user["Login"]; ?>
</li>
<?php
}
?>

</ul>