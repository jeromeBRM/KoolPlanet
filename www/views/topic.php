<article>
    <h1>
        <?= $data["topic"]["title"] ?>
    </h1>
    <p>
        <?= nl2br($data["topic"]["content"]) ?>
    </p>
    <div>
        Posté par <?= $data["topic"]["login"] ?> le <?= $data["topic"]["posted_at"] ?>
    </div>
</article>

<?php foreach($data["replies"] as $reply){ ?>
<article>
    <p>
        <?= nl2br($reply["content"]) ?>
    </p>
    <div>
        Posté par <?= $reply["login"] ?> le <?= $reply["posted_at"] ?>
    </div>
</article>
<?php } ?>

<div>
    <?php if (isset($_SESSION["login"])) { ?>
        <form method = "POST" action = '?action=topic&id=<?= $_GET["id"]?>'>
            <h3>Répondre</h3>
            <textarea type = "text" name = "reply_content"></textarea>
            <input type = "submit">
        </form>
        <?= $data["result"] ?>
    <?php } ?>
</div>