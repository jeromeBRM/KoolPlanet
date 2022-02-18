<?php

$data["connected"] = false;
$data["login"] = "";
$data["password"] = "";
$data["result"] = "";

if (isset($_POST["login"]) && isset($_POST["password"])){

    $data["login"] = $_POST["login"];
    $data["password"] = $_POST["password"];

    unset($_POST);

    $sql = $db->prepare(
        'SELECT login, password FROM kp_user WHERE login = ? LIMIT 1'
        );
    $sql->execute(array($data["login"]));

    $user = $sql->fetch();

    if($user != null){
        if (password_verify($data["password"], $user["password"])){
            $_SESSION["login"] = $data["login"];
            $data["connected"] = true;
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