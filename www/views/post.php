<h2>Topics</h2>
<div class="container_topic">
    <div> 
        <p> Liste des topics :</p>
            <ul>
                <?php foreach ($data["post_list"] as $post){ ?>
                    <li>
                    <div class ="div__topic">
                        <a href="?action=topic&id=<?= $post["id"] ?>">
                            <p><?= $post["title"] ?></p>
                        </a>
                    </div>
                    </li>
                <?php } ?>
            </ul>
    </div>
    <?php if (isset($_SESSION["login"])){ ?>
    <div class = "form__wrapper">
        <form class = "form__input" method = "POST" action = '?action=post'>
            <h3> Créer un topic
                <h4>Titre</h4>
                <input type = "text" name = "post_title">
                <h4>Message</h4>
                <textarea id="textarea1" type = "text" name = "post_content"></textarea>
            </h3>	
            <input type = "submit">
            <p><?= $data["result"]; ?></p>
        </form>
    </div>
    <?php } ?>
</div>