<?php
if (isset($enviar)) {
	$username = clear($username);
	$password = clear($password);

	$q = $mysqli->query("SELECT * FROM admins WHERE username = '$username' AND password = '$password'"); // Conecta con el servidor

	if (mysqli_num_rows($q) > 0) {
		$r = mysqli_fetch_array($q);
		$_SESSION['id'] = $r['id'];
		redir("?p=admin");
	} else {
		alert("Los datos no son válidos");
		redir("?p=admin");
	}
}

if (isset($_SESSION['id'])) { // SI hay una sesión iniciada
	?>
		<div class="login">
			<a href="?p=add_product">
				<button class="btn btn-primary"><i class="fad fa-plus-circle"></i> Agregar Producto</button>
			</a>
		</div>
	<?php
} else { // Si no hay una sesión iniciada
	?>
		<div class="login">
			<form method="post" action="">
				<fieldset class="fieldset">
					<legend class="legend">Iniciar Sesión Como Administrador</legend>

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
		</div>
	<?php
}
?>