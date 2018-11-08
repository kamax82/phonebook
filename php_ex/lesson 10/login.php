<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	setcookie('user', $_POST['user']);
	header('location: /index.php');
	exit();
}
 ?>

<form method="POST">
	<input type="text" name="user">
	<input type="submit" value="Login">
</form>