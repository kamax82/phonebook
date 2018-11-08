<?php
const PER_PAGE = 1;
$c = trim(file_get_contents('write'));
$comments = json_decode ($c);

if(!$comments){
	$comments = [];
}

if (isset($_POST['value'])){
	$name = (!empty($_POST['name'])) ? $_POST['name'] : 'anon';
	$comment = $_POST ['value'];
	
	$comments[] = [$name, $comment];

	$sc = json_encode($comments);
	file_put_contents('write', $sc);
	header("location: /index.php");
	exit();
}

?>
<form method="POST">
	<input type="text" name="name" placeholder="username"><br>
	<textarea type="text" name="value"></textarea>
	<input type="submit" value="Save">
</form>
<?php
if (isset($_GET['page']) && ($p = (int)$_GET['page']) && $p>0){
	$page = $p;
	}else{
	$page = 1;
	}
$min = ($page-1) * PER_PAGE;

$selected_comments = array_slice($comments, $min, PER_PAGE);

echo '<dl>';
foreach ($selected_comments as $index => $comment){
	echo nl2br("<dt>{$comment[0]}</dt><dd>{$comment[1]}</dd>");
	// echo "<a href='/rem_com.php?id={$index}'> REMOVE </a>";
	// echo "<a href='/upd_com.php?id={$index}'> UPDATE </a>";
	echo '<hr>';
}
echo '</dl>';

$total_pages = ceil(count($comments)/PER_PAGE);

if($page > 1){

$n = $page -1;
echo "<a href='/index.php?page={$n}'>Prev</a> - ";
}


foreach (range(1, $total_pages) as $n) {
	echo "<a href='/index.php?page={$n}'>{$n}</a> - ";
}

if($page < $total_pages){
$n = $page + 1;
echo "<a href='/index.php?page={$n}'>Next</a> - ";
}
