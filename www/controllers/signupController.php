<?php

if (isset($_POST["login"]) && isset($_POST["password"]) && isset($_POST["email"]) && isset($_POST["confirmation"])){

    // l'utilisateur a correctement saisi le formulaire

    $login = $_POST["login"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $confirmation = $_POST["confirmation"];

    if ($password == $confirmation){

        // l'utilisateur a correctement saisi son mot de passe

        global $pdo;

        $sql = $pdo->prepare(
            'INSERT INTO User VALUES (?, ?, ?)'
            );
        $sql->execute(array($login, $email, $password));

        echo "vous êtes inscrit !";
    }
    else{
        echo "veuillez confirmer votre mot de passe";
    }
}

$data = array (
);

render("signup", $data);