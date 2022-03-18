
<article>
    
    <div class = div__post__topic>
    <div>
        <img width="90px" height="90px" src="<?= $data["topic"]["avatar"] != "" ? "../upload/avatar/user_".$data["topic"]["id"]."/".$data["topic"]["avatar"] : "https://st.depositphotos.com/1598598/4847/i/950/depositphotos_48475325-stock-photo-isolated-plane-tree-on-a.jpg" ?>">
        <p class ="p__article">
        Posté par <a href="?action=user&id=<?= $data["topic"]["id"] ?>"><?= $data["topic"]["login"] ?><br>
        </a> le <?= $data["topic"]["posted_at"] ?>
        </p>
    </div>
    <div class="div__post__title">
    <h2>
        <?= htmlspecialchars($data["topic"]["title"]) ?>
    </h2>
    <p>
        <?= nl2br(htmlspecialchars($data["topic"]["content"])) ?>
    </p>
    </div>
    </div>

</article>
    <?php foreach($data["replies"] as $reply){ ?>
    <div class="div__post">
    <article class = "article__post">
        <div>
            <img width="50px" height="50px" src="<?= $reply["avatar"] != "" ? "../upload/avatar/user_".$reply["author_id"]."/".$reply["avatar"] : "https://st.depositphotos.com/1598598/4847/i/950/depositphotos_48475325-stock-photo-isolated-plane-tree-on-a.jpg" ?>">
            <p class ="p__article">
            Posté par <a href="?action=user&id=<?= $reply["author_id"] ?>"><?= $reply["login"] ?></a><br>
            <?= $reply["posted_at"] ?>
            </p>
        </div>
        
        <p>
            <?= nl2br(htmlspecialchars($reply["content"])) ?>
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