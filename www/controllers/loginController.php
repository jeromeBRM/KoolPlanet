<?php

$data["login"] = "";
$data["password"] = "";
$data["result"] = "";

if (isset($_POST["login"]) && isset($_POST["password"])){

    $data["login"] = $_POST["login"];
    $data["password"] = $_POST["password"];

    unset($_POST);

    $sql = $db->prepare(
        'select id, login, password from `user` where login = ? LIMIT 1'
        );
    $sql->execute(array($data["login"]));

    $user = $sql->fetch();

    if($user == null){
        $data["result"] = "L'utilisateur est introuvable.";
    }
    elseif(!password_verify($data["password"], $user["password"])){
        $data["result"] = "Mot de passe incorrect.";
    }
    else{
        $_SESSION["login"] = $data["login"];
        $_SESSION["id"] = $user["id"];
        $data["result"] = "Vous êtes connecté(e).";
        $connected = true;
    }
}

if(isset($connected)){
    require(__DIR__."/homeController.php");
}
else{
    render("login", $data);
}