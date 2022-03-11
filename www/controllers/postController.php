<?php

$data["form_complete"] = isset($_POST["post_title"]) && isset($_POST["post_content"]);
$data["result"] = "";

if ($data["form_complete"]){
    $data["form_complete"] = $_POST["post_title"] != "" && $_POST["post_content"] != "";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION["login"])) {

    if ($data["form_complete"]){

        $data["post_title"] = $_POST["post_title"];
        $data["post_content"] = $_POST["post_content"];

        try{
            $sql = $db->prepare(
                'insert into `topic` values (null, ?, ?, ?, datetime(\'now\', \'localtime\'))'
                );
            $sql->execute(array($_SESSION["id"], $data["post_title"], $data["post_content"]));
            
            $lastId = $db->lastInsertId();

            $data["result"] = "Le post a été créé ! (".$lastId.")";
        }
        catch (\PDOException $e){
            $data["result"] = $e->getMessage();
        }
    }
    else {
        $data["result"] = "Il faut remplir tout les champs !";
    }
}

unset($_POST);

$sql = $db->query("select id, title, content, posted_at from `topic`");
$posts = $sql->fetchAll();

$data["post_list"] = $posts;

render("post", $data);