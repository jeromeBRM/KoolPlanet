<?php

render("home");

$sql = $pdo->query("SELECT DISTINCT Count(Login) as c FROM User 
");
 $users = $sql->fetch();
echo $users["c"]; 

$sql = $pdo->query("SELECT * FROM User");
$users = $sql->fetchAll();
foreach($users as $user){


?>
<li>
    <?php echo $user["Login"]; ?>
</li>
<?php
}