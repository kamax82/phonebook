<h1>Hello, <?= isset($_COOKIE['user']) ? $_COOKIE['user'] : 'Anon' ?></h1>

<a href="login.php" class="btn btn-default btn-lg active" role="button">ВОЙТИ</a>
<a href="log_out.php" class="btn btn-default btn-lg active" role="button">exit</a>