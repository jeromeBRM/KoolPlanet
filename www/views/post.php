<p> Liste des sujets :</p>
<ul>
    <?php foreach ($data["post_list"] as $post){ ?>
        <li>
            <a href="?action=topic&id=<?= $post["id"] ?>">
                <h3><?= $post["title"] ?></h3>
                <p><?= $post["posted_at"]; ?></p>
            </a>
        </li>
    <?php } ?>
</ul>

<?php if (isset($_SESSION["login"])){ ?>
<div>
    <form method = "POST" action = '?action=post'>
        <h1> Créer un sujet de discussion
            <h3> Titre
            <input type = "text" name = "post_title">
            </h3>
            <h3> Message
            <textarea type = "text" name = "post_content"></textarea>
            </h3>
        </h1>	
        <input type = "submit">
        <p><?= $data["result"]; ?></p>
    </form>
</div>
<?php } ?>