<?php

$data["form_complete"] = isset($_POST["login"]) && isset($_POST["password"]) && isset($_POST["confirmation"]);

if ($data["form_complete"]){
    $data["form_complete"] = $_POST["login"] != "" && $_POST["password"] != "" && $_POST["confirmation"] != "";
}

$data["result"] = "";

if ($data["form_complete"]){

    $data["login"] = $_POST["login"];
    $data["password"] = $_POST["password"];
    $data["confirmation"] = $_POST["confirmation"];

    unset($_POST);

    if ($data["password"] == $data["confirmation"]){

        $hashedPassword = password_hash($data["password"], PASSWORD_DEFAULT);

        try{
            $sql = $db->prepare(
                'insert into `user` values (null, ?, ?, null, null, datetime(\'now\', \'localtime\'))'
                );
            $sql->execute(array($data["login"], $hashedPassword));
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