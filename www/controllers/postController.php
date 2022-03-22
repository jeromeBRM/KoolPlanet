<?php

$data["form_complete"] = isset($_POST["post_title"]) && isset($_POST["post_content"]);
$data["result"] = "";

if ($data["form_complete"]){
    $data["form_complete"] = $_POST["post_title"] != "" && $_POST["post_content"] != "";
}

// création d'un nouveau topic

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION["login"])) {

    if ($data["form_complete"]){

        $data["post_title"] = $_POST["post_title"];
        $data["post_content"] = $_POST["post_content"];

        try{
            $sql = $db->prepare(
                'insert into `topic` values (null, ?, ?, ?, ?, datetime(\'now\', \'localtime\'))'
                );
            $sql->execute(array($_SESSION["id"], explode('#', $_POST["topic_tag_query"])[1], $data["post_title"], $data["post_content"]));
            
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

// fetch les topics avec filtrage

$topic_title_filter = "1=1";
$topic_tag_filter = "1=1";

if (isset($_POST["topic_title_query"]) && isset($_POST["topic_tag_query"])){
    if ($_POST["topic_title_query"] != ""){
        $topic_title_filter = 'title like "%'.$_POST["topic_title_query"].'%"';
    }
    if ($_POST["topic_tag_query"] != "all"){
        $topic_tag_filter = "`topic`.tag_id = ".explode('#', $_POST["topic_tag_query"])[1];
    }
}

$sql = $db->query('
    select `topic`.id, `tag`.label, title, content, posted_at
    from `topic`
    left join `tag`
    on `topic`.tag_id = `tag`.id
    where '.$topic_title_filter.' and '.$topic_tag_filter.'
    ');
$posts = $sql->fetchAll();

unset($_POST);

$sql = $db->query("select id, label from `tag`");
$tags = $sql->fetchAll();

$data["post_list"] = $posts;
$data["tags"] = $tags;

render("post", $data);