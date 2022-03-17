
<article>
    <h2>
        <?= $data["topic"]["title"] ?>
    </h2>
    <div class = div__post__title>
    <div>
        <img width="50px" height="50px" src="<?= $data["topic"]["avatar"] != "" ? "../upload/avatar/user_1/".$data["topic"]["avatar"] : "https://st.depositphotos.com/1598598/4847/i/950/depositphotos_48475325-stock-photo-isolated-plane-tree-on-a.jpg" ?>">
        <p class ="p__article">
        Posté par <a href="?action=user&id=<?= $data["topic"]["id"] ?>"><br>
        <?= $data["topic"]["login"] ?></a> le <?= $data["topic"]["posted_at"] ?>
        </p>
    </div>
    <p>
        <?= nl2br($data["topic"]["content"]) ?>
    </p>
    </div>

</article>
    <?php foreach($data["replies"] as $reply){ ?>
    <div class="div__post">
    <article class = "article__post">
        <div>
            <img width="50px" height="50px" src="<?= $reply["avatar"] != "" ? "../upload/avatar/user_1/".$reply["avatar"] : "https://st.depositphotos.com/1598598/4847/i/950/depositphotos_48475325-stock-photo-isolated-plane-tree-on-a.jpg" ?>">
            <p class ="p__article">
            Posté par <a href="?action=user&id=<?= $reply["author_id"] ?>"><?= $reply["login"] ?></a><br>
            <?= $reply["posted_at"] ?>
            </p>
        </div>
        
        <p>
            <?= nl2br($reply["content"]) ?>
        </p>
    </article>
    </div>
    <?php } ?>

<div class = "container__post" >
    <?php if (isset($_SESSION["login"])) { ?>
        <form class = "form__input" method = "POST" action = '?action=topic&id=<?= $_GET["id"]?>'>
            <h4>Répondre</h4>
            <textarea type = "text" name = "reply_content"></textarea>
            <input type = "submit">
        </form>
        <?= $data["result"] ?>
    <?php } ?>
</div>