<div>
    <h1>
        <?= $data["topic"]["title"] ?>
    </h1>
    <p>
        <?= $data["topic"]["content"] ?>
    </p>
    <div>
        Posté par <?= $data["topic"]["login"] ?> 
    </div>
    <div>
        <?= $data["topic"]["posted_at"] ?>
    </div>
    <div>
        <?php if (isset($_SESSION["login"])) { ?>
            <form method = "POST" action = '?action=topic'>
                <h3>Répondre</h3>
                <textarea type = "text" name = "reply_content"></textarea>
                <input type = "submit">
            </form>
        <?php } ?>
    </div>
</div>