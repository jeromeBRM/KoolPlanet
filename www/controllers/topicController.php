<?php
$data["result"] = "";

try{
    $sql = $db->prepare(
        '
        select login, title, content, posted_at from `topic`
        inner join `user`
        where `topic`.author_id = `user`.id
        and `topic`.id = ? limit 1
        '
        );
    $sql->execute(array($_GET["id"]));
    $topic = $sql->fetch();

}
catch (\PDOException $e){
    $data["result"] = $e->getMessage();
}

render("topic", [
    "topic" => $topic,
]);