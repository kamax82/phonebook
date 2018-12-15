<?php
include 'conn.php';

$render_content = function(){
global $conn;
$contactsperpage = 10;
$page = isset($_GET['page']) && (int)$_GET['page'] > 0 
		? (int)$_GET['page']
		: 1;
$offset = ($page -1) * $contactsperpage;

include 'sort.html';

	if(!isset($_GET[NULL]))
		$contacts = mysqli_query($conn, 
		"SELECT * FROM contacts LIMIT $offset, $contactsperpage");
	if(isset($_GET['sort_name_asc']))
		$contacts = mysqli_query($conn, 
		"SELECT * FROM contacts ORDER BY contacts.name LIMIT $offset, $contactsperpage");
	if(isset($_GET['sort_name_desc']))
		$contacts = mysqli_query($conn, 
		"SELECT * FROM contacts ORDER BY contacts.name DESC LIMIT $offset, $contactsperpage");
	if(isset($_GET['sort_sname_asc']))
		$contacts = mysqli_query($conn, 
		"SELECT * FROM contacts ORDER BY contacts.sname LIMIT $offset, $contactsperpage");
	if(isset($_GET['sort_sname_desc']))
		$contacts = mysqli_query($conn, 
		"SELECT * FROM contacts ORDER BY contacts.sname DESC LIMIT $offset, $contactsperpage");
	if(isset($_GET['sort_tel_asc']))
		$contacts = mysqli_query($conn, 
		"SELECT * FROM contacts ORDER BY contacts.tel LIMIT $offset, $contactsperpage");
	if(isset($_GET['sort_tel_desc']))
		$contacts = mysqli_query($conn, 
		"SELECT * FROM contacts ORDER BY contacts.tel DESC LIMIT $offset, $contactsperpage");
	

	$totalcontacts = mysqli_fetch_row(mysqli_query($conn, "SELECT count(*) FROM contacts "))[0];

	$contact = mysqli_fetch_assoc($contacts);

	$max_page = ceil($totalcontacts / $contactsperpage);


	foreach ($contacts as $contact) {
		include 'list.html';
	 } 
	include 'pager.html';

};

include 'nav.html';









 ?>