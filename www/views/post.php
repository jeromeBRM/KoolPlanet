<p> Voici la liste des topics :</p>
<ul>
    <?php foreach ($data["post_list"] as $post){ ?>
        <li>
            <a href="?action=topic&id=<?= $post["id"] ?>">
                <h3><?= $post["content"]; ?></h3>
            </a>
            <p><?= $post["posted_at"]; ?></p>
        </li>
    <?php } ?>
</ul>

<div>
    <form method = "POST" action = '?action=post'>
        <h1> Créer un nouveau topic
            <h3> Titre du topic
                <input type = "text" name = "post_title">
            </h3>
            <h3> Contenu du topic
                <input type = "text" name = "post_content">
            </h3>
        </h1>	
        <input type = "submit">
        <p><?= $data["result"]; ?></p>
    </form>
</div>