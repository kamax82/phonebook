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

	if(!isset($_GET[NULL]) || isset($_GET['sort_name_asc']))
		$contacts = mysqli_query($conn, 
		"SELECT contacts.id, contacts.name, contacts.sname, contacts.email, phones.contact_id, phones.tel FROM contacts, phones WHERE phones.contact_id = contacts.id AND phones.main = 1 ORDER BY contacts.name LIMIT $offset, $contactsperpage");
	if(isset($_GET['sort_name_desc']))
		$contacts = mysqli_query($conn, 
		"SELECT contacts.id, contacts.name, contacts.sname, contacts.email, phones.contact_id, phones.tel FROM contacts, phones WHERE phones.contact_id = contacts.id AND phones.main = 1 ORDER BY contacts.name DESC LIMIT $offset, $contactsperpage");
	if(isset($_GET['sort_sname_asc']))
		$contacts = mysqli_query($conn, 
		"SELECT contacts.id, contacts.name, contacts.sname, contacts.email, phones.contact_id, phones.tel FROM contacts, phones WHERE phones.contact_id = contacts.id AND phones.main = 1 ORDER BY contacts.sname LIMIT $offset, $contactsperpage");
	if(isset($_GET['sort_sname_desc']))
		$contacts = mysqli_query($conn, 
		"SELECT contacts.id, contacts.name, contacts.sname, contacts.email, phones.contact_id, phones.tel FROM contacts, phones WHERE phones.contact_id = contacts.id AND phones.main = 1 ORDER BY contacts.sname DESC LIMIT $offset, $contactsperpage");
	// if(isset($_GET['sort_tel_asc']))
	// 	$contacts = mysqli_query($conn, 
	// 	"SELECT phones.contact_id, phones.tel, contacts.id, contacts.name, contacts.sname, contacts.email FROM contacts, phones WHERE phones.contact_id = contacts.id AND phones.main = 1 ORDER BY phones.tel LIMIT $offset, $contactsperpage");
	// if(isset($_GET['sort_tel_desc']))
	// 	$contacts = mysqli_query($conn, 
	// 	"SELECT phones.contact_id, phones.tel, contacts.id, contacts.name, contacts.sname, contacts.email FROM contacts, phones WHERE phones.contact_id = contacts.id AND phones.main = 1 ORDER BY phones.tel DESC LIMIT $offset, $contactsperpage");

	$totalcontacts = mysqli_fetch_row(mysqli_query($conn, "SELECT count(*) FROM contacts "))[0];

	$contact = mysqli_fetch_assoc($contacts);

	$max_page = ceil($totalcontacts / $contactsperpage);
	
	foreach ($contacts as $contact) {
		include 'list.html';
	 } 
	include 'pager.html';

};

include 'nav.html';
