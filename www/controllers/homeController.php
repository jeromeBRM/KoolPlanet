<?php

$sql = $data["pdo"]->query("SELECT DISTINCT Count(login) as c FROM kp_user");
$total = $sql->fetch();

$sql = $data["pdo"]->query("SELECT * FROM kp_user");
$users = $sql->fetchAll();

$data["user_list"] = $users;
$data["user_total"] = $total["c"];

render("home", $data);