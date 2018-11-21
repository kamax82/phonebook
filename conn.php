<?php
session_start();

$conn = mysqli_connect('127.0.0.1', 'root', 'kamax', 'phonebook');

$user = isset($_SESSION['user']) ? $_SESSION['user'] : NULL;

if (!isset ($_SESSION['messages'])){
	$_SESSION['messages'] = [];
}

include 'function.php';
