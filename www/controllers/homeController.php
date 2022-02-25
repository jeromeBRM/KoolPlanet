<?php

$sql = $db->query("SELECT DISTINCT Count(login) as c FROM kp_user");
$total = $sql->fetch();

$sql = $db->query("SELECT * FROM kp_user");
$users = $sql->fetchAll();

$data["user_list"] = $users;
$data["user_total"] = $total["c"];

render("home", $data);