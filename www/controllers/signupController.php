<?php

$data["form_complete"] = isset($_POST["login"]) && isset($_POST["password"]) && isset($_POST["mail"]) && isset($_POST["confirmation"]);
$data["result"] = "";

if ($data["form_complete"]){

    $data["login"] = $_POST["login"];
    $data["password"] = $_POST["password"];
    $data["mail"] = $_POST["mail"];
    $data["confirmation"] = $_POST["confirmation"];

    unset($_POST);

    if ($data["password"] == $data["confirmation"]){

        $hashedPassword = password_hash($data["password"], PASSWORD_DEFAULT);

        try{
            $sql = $db->prepare(
                'insert into `user` values (null, ?, ?, ?)'
                );
            $sql->execute(array($data["login"], $hashedPassword, $data["mail"]));
            $data["result"] = "Vous êtes inscrit !";
        }
        catch (\PDOException $e){
            $data["result"] = $e->getMessage();
        }
    }
    else{
        $data["result"] = "Les mots de passe renseignés ne correspondent pas !";
    }
}

render("signup", $data);