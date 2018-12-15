<?php 
include 'conn.php';

$user_array = handle_user_request();

if ($user_array) {
	$_SESSION['attempts'];
	login_user($user_array);
}

$render_content = function(){
	$submit_label = 'Login';
	include 'user_form.html';
};




include 'nav.html';
 ?>