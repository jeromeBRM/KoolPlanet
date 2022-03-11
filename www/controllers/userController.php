<?php

try{
    $sql = $db->prepare(
        '
        select login, avatar from `user`
        where `user`.id = ? limit 1
        '
        );
    $sql->execute(array($_GET["id"]));
    $user = $sql->fetch();
}
catch (\PDOException $e){
    $data["result"] = $e->getMessage();
}

render("user", [
    "user" => $user,
]);