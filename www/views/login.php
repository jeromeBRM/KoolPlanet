<form method="POST" action="?action=login">
	<h1>Connection
		<h3> Login
			<input type="text" name="login">
		</h3>
		<h3> Password
			<input type="password" name="password">
		</h3>
	</h1>
	<p><?php echo $data["result"]; ?></p>
	<input type="submit">
</form>