<?php

$data["result"] = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($data["form_complete"]){

        $data["post_title"] = $_POST["post_title"];
        $data["post_content"] = $_POST["post_content"];

        try{
            $sql = $db->prepare(
                'INSERT INTO kp_post VALUES (?, ?, ?, ?, ?)'
                );
            $sql->execute(array(null, $data["post_title"], $data["post_content"], 0, 0));
            $data["result"] = "Le post a été créé !";
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

$sql = $db->query("SELECT id, title FROM kp_post");
$posts = $sql->fetchAll();

$data["post_list"] = $posts;

render("post", $data);