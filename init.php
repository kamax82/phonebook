<?php
session_start();

$conn = mysqli_connect('127.0.0.1', 'root', 'kamax', 'local_test');

$user = isset($_SESSION['user']) ? $_SESSION['user'] : NULL;

if (!isset ($_SESSION['messages'])){
	$_SESSION['messages'] = [];
}

require 'function.php';
