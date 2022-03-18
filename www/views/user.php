<h2>Profil de <?= $data["user"]["login"] ?></h2>

<p>Utilisateur inscrit le <?= $data["user"]["registration_date"] ?></p>
<p>Nombre de messages postés : <?= $data["total"] ?></p>

<img width="100px" height="100px" src="<?= $data["user"]["avatar"] != "" ? "../upload/avatar/user_".$data["user"]["id"]."/".$data["user"]["avatar"] : "https://st.depositphotos.com/1598598/4847/i/950/depositphotos_48475325-stock-photo-isolated-plane-tree-on-a.jpg" ?>">

<p><?= nl2br(htmlspecialchars($data["user"]["description"])) ?></p>

<?php if ($data["current_user"]) { ?>
<button onclick=document.querySelector("form").style.display="flex">Modifier le profil</button>
<form style="display:none;" method="post" enctype="multipart/form-data">
    <label for="avatar">Modifier votre description</label>
    <textarea id="description" name="description"><?= htmlspecialchars($data["user"]["description"]) ?></textarea>
    <label for="avatar">Modifier votre photo de profil</label>
    <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg">
    <input type="submit" value="Enregistrer">
</form>
<?php } ?>