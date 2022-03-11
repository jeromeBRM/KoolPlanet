<?php

$sql = $db->query("select count(*) as c from `user`");
$total = $sql->fetch();

$sql = $db->query("select id, login from `user` limit 30");
$users = $sql->fetchAll();

render("home", [
    "username_list" => $users,
    "user_total" => $total["c"],
]);