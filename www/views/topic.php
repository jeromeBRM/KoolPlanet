<div>
    <h1>
        <?= $data["topic"]["title"] ?>
    </h1>
    <p>
        <?= $data["topic"]["content"] ?>
    </p>
    <div>
        Posté par <?= $data["topic"]["login"] ?> le <?= $data["topic"]["posted_at"] ?>
    </div>
</div>

<div>
<?php foreach($data["replies"] as $reply){ ?>
    <p>
        <?= $reply["content"] ?>
    </p>
    <div>
        Posté par <?= $reply["login"] ?> le <?= $reply["posted_at"] ?>
    </div>
<?php } ?>
</div>

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