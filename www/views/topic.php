<article>
    <h2>
        <?= $data["topic"]["title"] ?>
    </h2>
    <p>
        <?= nl2br($data["topic"]["content"]) ?>
    </p>
    <div>
        <img width="50px" height="50px" src="<?= $data["topic"]["avatar"] != "" ? "../www/upload/avatar/user_1/".$data["topic"]["avatar"] : "https://st.depositphotos.com/1598598/4847/i/950/depositphotos_48475325-stock-photo-isolated-plane-tree-on-a.jpg" ?>">
        Posté par <a href="?action=user&id=<?= $data["topic"]["id"] ?>"><?= $data["topic"]["login"] ?></a> le <?= $data["topic"]["posted_at"] ?>
    </div>
</article>

<?php foreach($data["replies"] as $reply){ ?>
<article>
    <p>
        <?= nl2br($reply["content"]) ?>
    </p>
    <div>
        <img width="50px" height="50px" src="<?= $reply["avatar"] != "" ? "../www/upload/avatar/user_1/".$reply["avatar"] : "https://st.depositphotos.com/1598598/4847/i/950/depositphotos_48475325-stock-photo-isolated-plane-tree-on-a.jpg" ?>">
        Posté par <a href="?action=user&id=<?= $reply["author_id"] ?>"><?= $reply["login"] ?></a> le <?= $reply["posted_at"] ?>
    </div>
</article>
<?php } ?>

<div>
    <?php if (isset($_SESSION["login"])) { ?>
        <form method = "POST" action = '?action=topic&id=<?= $_GET["id"]?>'>
            <h4>Répondre</h4>
            <textarea type = "text" name = "reply_content"></textarea>
            <input type = "submit">
        </form>
        <?= $data["result"] ?>
    <?php } ?>
</div>