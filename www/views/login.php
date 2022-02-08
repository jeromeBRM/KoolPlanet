<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	if ($_POST["login"] !== "babar") {
		echo "wrong login";
	}
	
	if ($_POST["password"] !== "celeste") {
		echo "wrong password";
	}
	
	echo "ok";
} else {
?>

<h1>Login Form</h1>
<form method="POST" action="?action=login">
	<input type="text" name="login">
	<input type="password" name="password">
	<input type="submit">
</form>

<?php
}
?>
<!--
<?php
echo '$_SERVER=';
print_r($_SERVER);
echo '$_POST=';
print_r($_POST);
echo '$_GET=';
print_r($_GET);
?>
-->