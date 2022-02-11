<p>Bienvenue</p>

<p>Nombre d'utilisateurs inscrits : (
    <?php

    $sql = $pdo->query("SELECT DISTINCT Count(Login) as c FROM User 
    ");
    $users = $sql->fetch();
    echo $users["c"]; 
    ?>
)</p>
<p>Coucou ! Voici la liste des utilisateurs :</p>

<ul>

<?php

$sql = $pdo->query("SELECT * FROM User");
$users = $sql->fetchAll();
foreach($users as $user){
?>
<li>
    <?php echo $user["Login"]; ?>
</li>
<?php
}
?>

</ul>