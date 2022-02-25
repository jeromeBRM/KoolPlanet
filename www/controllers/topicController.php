<?php
$data["result"] = "";
try{
    $sql = $db->prepare(
        'select title, content, posted_at from `topic` where id = ? limit 1'
        );
    $sql->execute(array($_GET["id"]));
    $topic = $sql->fetchAll();
    $data["topic"] = $topic;
}
catch (\PDOException $e){
    $data["result"] = $e->getMessage();
}

render("topic", $data);