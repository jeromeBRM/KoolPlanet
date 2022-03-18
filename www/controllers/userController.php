<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION["login"])){

    if (isset($_POST["description"])){
        try{
            $sql = $db->prepare(
                '
                update user
                set description = ?
                where id = ?
                '
                );
            $sql->execute(array($_POST["description"], $_SESSION["id"]));
        }
        catch (\PDOException $e){
            $data["result"] = $e->getMessage();
        }
    }

    if (isset($_FILES["avatar"])) {
        $tmpName = $_FILES['avatar']['tmp_name'];
        $name = $_FILES['avatar']['name'];
        $size = $_FILES['avatar']['size'];
        $error = $_FILES['avatar']['error'];

        $extensions = ['jpg', 'png', 'jpeg', 'PNG'];
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
        elseif ($name != ""){
            echo "Mauvaise extension ou taille trop grande";
            exit;
        }
    }
}

try{
    $sql = $db->prepare(
        '
        select id, login, avatar, description, registration_date from `user`
        where `user`.id = ? limit 1
        '
        );
    $sql->execute(array($_GET["id"]));
    $user = $sql->fetch();
}
catch (\PDOException $e){
    $data["result"] = $e->getMessage();
}

try{
    $sql = $db->prepare(
        '
        select count(*) topics
        from `topic`
        where `topic`.author_id = ?
        '
        );
    $sql->execute(array($user["id"]));
    $count = $sql->fetch();
    $total = $count["topics"];
}
catch (\PDOException $e){
    $data["result"] = $e->getMessage();
}

try{
    $sql = $db->prepare(
        '
        select count(*) replies
        from `reply`
        where `reply`.author_id = ?
        '
        );
    $sql->execute(array($user["id"]));
    $count = $sql->fetch();
    $total += $count["replies"];
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
    "total" => $total,
    "current_user" => $current_user,
]);