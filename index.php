<?php
include "configs/functions.php";
include "configs/config.php";

if (!isset($p)) {
	$p = "main";
} else {
	$p = $p;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>ALYV Studio</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="tt-chocolates/chocolates.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
	<script src="scripts/jquery.js"></script>
	<script src="fontawesome/js/all.min.js"></script>
</head>
<body>
	<!-- Navigation on the left side -->
	<div class="sidenav" id="sidenav">
    <button class="close-btn" href="javascript:void(0)" onclick="closeNav()"><span data-feather='x'></span></button>
    <div class="nav">
      <div class="col">
        <a href="?p=main">Inicio</a>
        <a href="?p=products">Productos</a>
        <a href="?p=our">Nosotros</a>
				<a href="?p=contact">Contacto</a>
				<a href="?p=admin">Administrador</a>
      </div>
    </div>
  </div>
  <!-- End of navigation on the left side -->


	<div class="navbar">
		<nav>
			<ul class="nav">
				<li><a href="?p=main" class="logo"><b>Alyv</b> Studio</a></li>
			</ul>
		</nav>
		<nav>
			<ul class="nav d-mwnu">
				<li><a href="?p=main">Inicio</a></li>
				<li><a href="?p=products">Productos</a></li>
				<li><a href="?p=our">Nosotros</a></li>
				<li><a href="?p=contact">Contacto</a></li>
				<li><a href="?p=admin">Administrador</a></li>
			</ul>
		</nav>

		<nav>
			<style>
				.username {
					text-transform: uppercase;
					font-weight: bold;
				}
			</style>
			<button class="btn-sidenav" onclick="openNav()">&#9776;</button>
			<ul class="nav d-menu">
			<!-- Check if client is connected -->
			<?php
				if (isset($_SESSION['id_cliente'])) {
			?>
				<button class="btn btn-primary" onclick="location.href='?p=salir'"><?=nombre_cliente($_SESSION['id_cliente'])?></button>
				<!-- <li><a href="#" class="username"><?=nombre_cliente($_SESSION['id_cliente'])?></a></li>
				<li><a href="?p=salir">Salir</a></li> kill session -->

			<?php
				}
			?>
			</ul>
		</nav>
		<!-- button class="btn btn-primary" onclick="location.href='?p=main'"><i data-feather="log-in"></i> Iniciar Sesión</button -->
	</div>

	<!-- contenido de la página -->
	<div class="content">
		<div class="container margin-top">
			<?php
				if (file_exists("modules/" . $p . ".php")) {
					include "modules/" . $p . ".php";
				} else {
					echo "<i>No se ha encontrado el modulo. <b>" . $p . "</b> <a class='link-text' href='./'>Regresar</a></i>";
				}
			?>
			<br>
		</div>
	</div>

	<footer class="container margin-top">
		Copyright &copy; ALYV Design 31251421 <?=date("Y")?>
	</footer>
	<script>
		function openNav() {
        document.getElementById("sidenav").style.width = "100%";
    }
    
    function closeNav() {
        document.getElementById("sidenav").style.width = "0px";
    }
	</script>
</body>
</html>

<!-- 1361px; 74px -->