<?php 
$max_users = 3;
if (isset($_GET['page']) && (int)$_GET['page'] > 0){
		$page = (int)$_GET['page'];
	}else{
		$page = 1;
}

$offset = ($page -1)*$max_users;




$conn = mysqli_connect('127.0.0.1', 'root', 'kamax', 'local_test');

$result = mysqli_query($conn, "SELECT * FROM users limit $offset, $max_users");
$total = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM users"));

$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

$max_page = ceil($total / $max_users);

	foreach($rows as $row){
		include'user.html';
	}

include'pager.html';
