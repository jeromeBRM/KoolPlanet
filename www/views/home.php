<p>Bienvenue</p>

<p>Nombre d'utilisateurs inscrits : (<?php echo $data["user_total"]; ?>)</p>
<p>Coucou ! Voici la liste des utilisateurs :</p>

<ul>
    <?php foreach($data["user_list"] as $user){ ?>
        <li>
            <?php echo $user["Login"]; ?>
        </li>
    <?php } ?>
</ul>