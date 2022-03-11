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
</div>