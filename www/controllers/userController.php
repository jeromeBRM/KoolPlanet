<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION["login"]) && isset($_FILES["avatar"])) {
    $tmpName = $_FILES['avatar']['tmp_name'];
    $name = $_FILES['avatar']['name'];
    $size = $_FILES['avatar']['size'];
    $error = $_FILES['avatar']['error'];

    $extensions = ['jpg', 'png', 'jpeg'];
    $tabExtension = explode('.', $name);
    $extension = strtolower(end($tabExtension));
    
    $maxSize = 1000000;
    
    if(in_array($extension, $extensions) && $size <= $maxSize){

        if (!file_exists(__DIR__.'../../upload/avatar/user_'.$_SESSION["id"].'/')) {
            mkdir(__DIR__.'../../upload/avatar/user_'.$_SESSION["id"].'/', 0777, true);
        }

        move_uploaded_file($tmpName, __DIR__.'../../upload/avatar/user_'.$_SESSION["id"].'/'.$name);

        try{
            $sql = $db->prepare(
                '
                update user
                set avatar = ?
                where id = ?
                '
                );
            $sql->execute(array($name, $_SESSION["id"]));
        }
        catch (\PDOException $e){
            $data["result"] = $e->getMessage();
        }
    }
    else{
        echo "Mauvaise extension ou taille trop grande";
        exit;
    }
}

try{
    $sql = $db->prepare(
        '
        select id, login, avatar, registration_date from `user`
        where `user`.id = ? limit 1
        '
        );
    $sql->execute(array($_GET["id"]));
    $user = $sql->fetch();
}
catch (\PDOException $e){
    $data["result"] = $e->getMessage();
}

$current_user = false;

if (isset($_SESSION['id'])){
    $current_user = $user["id"] == $_SESSION["id"];
}

render("user", [
    "user" => $user,
    "current_user" => $current_user,
]);