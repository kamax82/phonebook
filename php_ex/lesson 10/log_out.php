<?php 
	setcookie('user', null, time() - 10);
	header('location: /index.php');
	exit();