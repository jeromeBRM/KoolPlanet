<?php

$sql = $db->query("SELECT DISTINCT Count(login) as c FROM kp_user");
$total = $sql->fetch();

$sql = $db->query("SELECT * FROM kp_user");
$users = $sql->fetchAll();

$sql = $db->query("SELECT id, title FROM kp_post");
$posts = $sql->fetchAll();

/*
        try{
            $sql = $db->prepare(
                'INSERT INTO kp_post VALUES (?, ?, ?)'
                );
            $sql->execute(array($data["login"], $data["email"], $hashedPassword));
            $data["result"] = "Vous êtes inscrit !";
        }
        catch (\PDOException $e){
            $data["result"] = $e->getMessage();
        }
    
*/

$data["user_list"] = $users;
$data["user_total"] = $total["c"];
$data["post_list"] = $posts;

render("home", $data);