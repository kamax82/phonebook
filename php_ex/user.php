<?php

function get_users()
{
	return range('a', 'f');
}


$a = 123;
function render_page()
{
		foreach (get_users() as $user) {
		include '_users_details.php';
	}
}

echo $a;
require 'base.html';

echo $a;
?>