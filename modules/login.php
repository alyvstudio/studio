<?php
if (isset($_SESSION['id_cliente'])) {
	redir("./");
}

if (isset($enviar)) {
	$username = clear($username);
	$password = clear($password);

	$q = $mysqli->query("SELECT * FROM clients WHERE username = '$username' AND password = '$password'"); // Conecta con el servidor

	if (mysqli_num_rows($q) > 0) {
		$r = mysqli_fetch_array($q);
		$_SESSION['id_cliente'] = $r['id'];
		if (isset($return)) {
			redir("?p=" . $return);
		} else {
			redir("./");
		}
	} else {
		alert("Los datos no son válidos");
		redir("?p=login");
	}
}
?>
		<form method="post" action="">
			<fieldset class="fieldset">
				<legend class="legend">Iniciar Sesión</legend>

				<div class="margin">
					<input class="input" type="text" placeholder="Usuario" name="username">
				</div>

				<div class="margin">
					<input class="input" type="password" placeholder="Contraseña" name="password">
				</div>

				<div class="margin">
					<button class="btn btn-primary" name="enviar" type="submit">Aceptar</button>
				</div>

			</fieldset>
		</form>