<p>Bienvenue</p>

<p>Nombre d'utilisateurs inscrits : (<?= $data["user_total"]; ?>)</p>
<p>Voici la liste des utilisateurs :</p>

<ul>
    <?php foreach($data["username_list"] as $user){ ?>
        <li>
            <a href="?action=user/"><?= $user["login"]; ?>
        </li>
    <?php } ?>
</ul>