<?php 
$conn = mysqli_connect('127.0.0.1', 'root', 'kamax', 'local_test');

if ($_SERVER['REQUEST_METHOD']==='POST'){
	 $name = $_POST['name'];
	 $password = $_POST['password'];
	 $email = $_POST['email'];

	 mysqli_query($conn, "INSERT INTO users (name, pass, email) VALUES ('{$name}','{$password}','{$email}'");
	 	// header('location: /index.php');
	 	// exit();
}
$tamplat = '_user_form.php';

include 'base.html';

