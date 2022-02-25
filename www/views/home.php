<p>Bienvenue</p>

<p>Nombre d'utilisateurs inscrits : (<?= $data["user_total"]; ?>)</p>
<p>Voici la liste des utilisateurs :</p>

<ul>
    <?php foreach($data["user_list"] as $user){ ?>
        <li>
            <?= $user["login"]; ?>
        </li>
    <?php } ?>
</ul>

