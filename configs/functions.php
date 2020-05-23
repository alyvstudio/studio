<?php
$host_mysql = "localhost";
$user_mysql = "root";
$password_mysql = "root";
$db_mysql = "webstore";
$mysqli = mysqli_connect($host_mysql, $user_mysql, $password_mysql, $db_mysql);

function clear($var) {
	htmlspecialchars($var);
	return $var;
}

function check_admin() {
	if (!isset($_SESSION['id'])) {
		redir("./");
	}
}

function redir($var) {
	?>
<script>
	window.location="<?=$var?>";
</script>
<?php
die();
}

function alert($var) {
	?>
	<script type="text/javascript">
		alert("<?=$var?>");
	</script>
	<?php
die();
}

function check_user($url) {
	if (!isset($_SESSION['id_cliente'])) {
		redir("?p=login&return=$url");
	} else {

	}
}

function nombre_cliente($id_cliente) {
	$mysqli = connect();

	$q = $mysqli->query("SELECT * FROM clients WHERE id = '$id_cliente'");
	$r = mysqli_fetch_array($q);
	return $r['name'];
}

function connect() {
	$host_mysql = "localhost";
	$user_mysql = "root";
	$password_mysql = "root";
	$db_mysql = "webstore";

	$mysqli = mysqli_connect($host_mysql, $user_mysql, $password_mysql, $db_mysql);

	return $mysqli;
}
?>