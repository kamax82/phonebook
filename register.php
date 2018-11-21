<?php 
include 'conn.php';

$user_array = handle_user_request();

if ($user_array) {
	register_user($user_array);
}


$render_content = function(){
	$submit_label = 'Register';
	include 'user_form.html';
};



include 'nav.html';
 