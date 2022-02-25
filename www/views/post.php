<p> Voici la liste des topics :</p>
<ul>
    <?php foreach ($data["post_list"] as $post){ ?>
        <li>
            <a href="?action=post&id=<?= $post["id"]?>"><h4><?= $post["content"]; ?></h4></a>
        </li>
    <?php } ?>
</ul>

<div>
    <form method = "POST" action = '?action=post'>
        <h1> Topic
            <h3> Titre du Poste
                <input type = "text" name = "post_title">
            </h3>
            <h3> Contenu du poste
                <input type = "text" name = "post_content">
            </h3>
        </h1>	
        <input type = "submit">
        <p><?= $data["result"]; ?></p>
    </form>
</div>