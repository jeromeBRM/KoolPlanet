<?php

$data["form_complete"] = isset($_POST["login"]) && isset($_POST["password"]) && isset($_POST["email"]) && isset($_POST["confirmation"]);
$data["result"] = "";

if ($data["form_complete"]){

    $data["login"] = $_POST["login"];
    $data["password"] = $_POST["password"];
    $data["email"] = $_POST["email"];
    $data["confirmation"] = $_POST["confirmation"];

    unset($_POST);

    if ($data["password"] == $data["confirmation"]){

        $hashedPassword = password_hash($data["password"], PASSWORD_DEFAULT);

        try{
            $sql = $data["pdo"]->prepare(
                'INSERT INTO kp_user VALUES (?, ?, ?)'
                );
            $sql->execute(array($data["login"], $data["email"], $hashedPassword));
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