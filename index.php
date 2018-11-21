<?php
include 'conn.php';

$render_content = function(){
global $conn;
$contactsperpage = 10;
$page = isset($_GET['page']) && (int)$_GET['page'] > 0 
		? (int)$_GET['page']
		: 1;
$offset = ($page -1) * $contactsperpage;

// include 'sort.html';

	$contacts = mysqli_query($conn, 
		"SELECT * FROM contacts LIMIT $offset, $contactsperpage");

	$totalcontacts = mysqli_fetch_row(mysqli_query($conn, "SELECT count(*) FROM contacts"))[0];

	$contact = mysqli_fetch_assoc($contacts);

	$max_page = ceil($totalcontacts / $contactsperpage);


	foreach ($contacts as $contact) {
		include 'list.html';
	 } 
	include 'pager.html';

};

include 'nav.html';









 ?>