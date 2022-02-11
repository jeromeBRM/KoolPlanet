<?php

$data = array (
    "connected" => false,
    "login" => "",
    "password" => "",
    "result" => ""
);

if (isset($_POST["login"]) && isset($_POST["password"])){

    $data["login"] = $_POST["login"];
    $data["password"] = $_POST["password"];

    unset($_POST);

    $sql = $pdo->prepare(
        'SELECT Login, Password FROM User WHERE Login = ? LIMIT 1'
        );
    $sql->execute(array($data["login"]));

    $user = $sql->fetch();

    if($user != null){
        if (password_verify($data["password"], $user["Password"])){
            $data["result"] = "Vous êtes connecté(e).";
        }
        else{
            $data["result"] = "Mot de passe incorrect.";
        }
    }
    else{
        $data["result"] = "L'utilisateur est introuvable.";
    }
}

render("login", $data);