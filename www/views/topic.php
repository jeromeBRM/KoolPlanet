<article>
    <h2>
        <?= $data["topic"]["title"] ?>
    </h2>
    <p>
        <?= nl2br($data["topic"]["content"]) ?>
    </p>
    <div>
        Posté par <a href="?action=user&id=<?= $data["topic"]["id"] ?>"><?= $data["topic"]["login"] ?></a> le <?= $data["topic"]["posted_at"] ?>
    </div>
</article>

<?php foreach($data["replies"] as $reply){ ?>
<article>
    <p>
        <?= nl2br($reply["content"]) ?>
    </p>
    <div>
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