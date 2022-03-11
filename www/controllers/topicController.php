<?php
$data["form_complete"] = isset($_POST["reply_content"]);
$data["result"] = "";

if ($data["form_complete"]){
    $data["form_complete"] = $_POST["reply_content"] != "";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION["login"])) {

    if ($data["form_complete"]){

        $data["reply_content"] = $_POST["reply_content"];

        try{
            $sql = $db->prepare(
                'insert into `reply` values (null, ?, ?, ?, datetime(\'now\', \'localtime\'))'
                );
            $sql->execute(array($_SESSION["id"], $_GET["id"], $data["reply_content"]));
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

try{
    $sql = $db->prepare(
        '
        select `user`.id, login, title, content, posted_at
        from `topic`
        inner join `user`
        where `topic`.author_id = `user`.id
        and `topic`.id = ? limit 1
        '
        );
    $sql->execute(array($_GET["id"]));
    $topic = $sql->fetch();

    $sql = $db->prepare(
        '
        select author_id, login, content, posted_at
        from `reply`
        inner join `user`
        where `reply`.author_id = `user`.id
        and `topic_id` = ?
        '
        );
    $sql->execute(array($_GET["id"]));
    $replies = $sql->fetchAll();
}
catch (\PDOException $e){
    $data["result"] = $e->getMessage();
}

render("topic", [
    "result" => $data["result"],
    "topic" => $topic,
    "replies" => $replies,
]);