<form method="POST" enctype="multipart/form-data">
	<input type="file" name="img" >
	<input type="submit" value="Upload">
</form>

<pre>
<?php

if(!is_dir('images')) {
	mkdir('images');
}

if(key_exists('img', $_FILES)){
	$img = $_FILES['img'];
	var_export($img);
		if (!$img['error']){
			if(is_uploaded_file($img['tmp_name']));{
			rename($img['tmp_name'], 'images/'.$img['name']);
		}
	}
}


?>