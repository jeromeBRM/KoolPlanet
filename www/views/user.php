<h2>Profil de <?= $data["user"]["login"] ?></h2>

<p>Utilisateur inscrit le <?= $data["user"]["registration_date"] ?></p>
<p>Nombre de messages postés : </p>

<img width="100px" height="100px" src="<?= $data["user"]["avatar"] != "" ? "../upload/avatar/user_1/".$data["user"]["avatar"] : "https://st.depositphotos.com/1598598/4847/i/950/depositphotos_48475325-stock-photo-isolated-plane-tree-on-a.jpg" ?>">

<?php if ($data["current_user"]) { ?>
<form method="post" enctype="multipart/form-data">
    <h3>Modifier votre photo de profil</h3>
    <label for="avatar">Sélectionner le fichier à envoyer</label>
    <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg">
    <input type="submit">
</form>
<?php } ?>