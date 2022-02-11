<?php

$sql = $pdo->query("SELECT DISTINCT Count(Login) as c FROM User");
$total = $sql->fetch();

$sql = $pdo->query("SELECT * FROM User");
$users = $sql->fetchAll();

$data = array (
    "user_list"=>$users,
    "user_total"=>$total["c"]
);

render("home", $data);