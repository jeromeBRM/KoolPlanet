<p>Bienvenue</p>

<p>Nombre d'utilisateurs inscrits : (<?php echo $data["user_total"]; ?>)</p>
<p>Voici la liste des utilisateurs :</p>

<ul>
    <?php foreach($data["user_list"] as $user){ ?>
        <li>
            <?php echo $user["login"]; ?>
        </li>
    <?php } ?>

    <?php foreach ($data["post_list"] as $post){ ?>
        <li>
            <?php
            echo $post["id"];
            echo $post["title"];
            ?>
        </li>
    <?php } ?>

    <form method = "POST" action = '?action=home'>
	<h1> Topic
		<h3> Titre du Poste
			<input type = "text" name = "post_title">
		</h3>
		<h3> Contenue du poste
			<input type = "text" name = "post_content">
		</h3>
	</h1>	
    <input type = "submit">
    <p><?php echo $data["result"]; ?></p>
</form>

</ul>


