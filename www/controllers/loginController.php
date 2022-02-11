<?php

$data = array (
    "connected" => false,
    "login" => "",
    "password" => ""
);

// 1 ere requete sql qui cherche l'uilisateur login

// SELECT * FROM User

// deuxieme requete sql qui verifie si le mdp renseigné edt bien celui corresopndant au login



if ($_SERVER["REQUEST_METHOD"] === "POST") {
	if ($_POST["login"] !== "babar") {
		echo "wrong login";
	}
	
	if ($_POST["password"] !== "celeste") {
		echo "wrong password";
	}
	
	echo "ok";
} else {

}
    
echo '$_SERVER=';
print_r($_SERVER);
echo '$_POST=';
print_r($_POST);
echo '$_GET=';
print_r($_GET);


render("login", $data);

