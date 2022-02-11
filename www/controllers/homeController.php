<?php

$sql = $data["pdo"]->query("SELECT DISTINCT Count(Login) as c FROM User");
$total = $sql->fetch();

$sql = $data["pdo"]->query("SELECT * FROM User");
$users = $sql->fetchAll();

$data["user_list"] = $users;
$data["user_total"] = $total["c"];

render("home", $data);