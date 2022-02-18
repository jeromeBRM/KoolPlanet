<p>Bienvenue</p>

<p>Nombre d'utilisateurs inscrits : (<?php echo $data["user_total"]; ?>)</p>
<p>Voici la liste des utilisateurs :</p>

<ul>
    <?php foreach($data["user_list"] as $user){ ?>
        <li>
            <?php echo $user["login"]; ?>
        </li>
    <?php } ?>

    <?php foreach ($data["post_list"] as $post){ ?>
        <li>
            <?php
            echo $post["id"];
            echo $post["title"];
            ?>
        </li>
    <?php } ?>

    <form>
    // titre + contenue avec un bouton return le formulaire avec le new contenue
    </form>

</ul>


