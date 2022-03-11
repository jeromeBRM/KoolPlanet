<h2>Bienvenue sur KoolPlanet</h2>
<p>Saviez vous que, chaque jour, on estime que 10 millions d’arbres sont coupés, soit 1/7 de la population 
française? Saviez vous que l’ordinateur avec lequel vous regardez ce site consomme 200 kwh, soit 10 fois la production énergétique maximale 
d’une éolienne domestique, et que chaque français génère en moyenne 5 tonnes de déchets par an ? Et pourtant, ces chiffres ne cessent d’augmenter.</p>
<p>Le Forum Koolplanet constitue un lieu de rencontre et d’échange où il est question principalement 
de la dimension environnementale du développement durable. Venez partager vos astuces ainsi que vos interrogations.</p>
<p>Rejoignez le mouvement KoolPlanet !</p>

<p>Nombre de kool : <?= $data["user_total"]; ?></p>
<ul>
    <?php foreach($data["username_list"] as $user){ ?>
        <li>
            <a href="?action=user&id=<?= $user["id"] ?>"><?= $user["login"] ?></a>
        </li>
    <?php } ?>
</ul>