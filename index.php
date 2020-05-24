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
	<div class="sidenav" id="sidenav">
    <button class="close-btn" href="javascript:void(0)" onclick="closeNav()"><i class="fad fa-times"></i></button>
    <div class="nav">
      <div class="col">
      	<a href="?p=main">Inicio</a>
      	<a href="?p=products">Productos</a>
      	<a href="?p=services">Servicios</a>
      	<a href="?p=projects">Proyectos</a>
      	<a href="?p=about">Acerca de</a>
      	<a href="?p=contact">Contacto</a>
      	<a href="?p=admin">Administrador</a></div>
    </div>
  </div>

  <header>
    <div class="navbar">
      <nav>
        <ul class="nav">
          <li><a class="logo" href="index.html"><b>alyv</b> Studio</a></li>
        </ul>
      </nav>
      <nav>
        <ul class="nav d-menu">
        	<a href="?p=main">Inicio</a>
	      	<a href="?p=products">Productos</a>
	      	<a href="?p=services">Servicios</a>
	      	<a href="?p=projects">Proyectos</a>
	      	<a href="?p=about">Acerca de</a>
	      	<a href="?p=contact">Contacto</a>
	      	<a href="?p=admin">Administrador</a>
        </ul>
      </nav>
      <!-- Check if client is connected -->
			<?php
				if (isset($_SESSION['id_cliente'])) {
			?>
				<nav>
					<ul class='nav'>
						<a><?=nombre_cliente($_SESSION['id_cliente'])?></a>
						<a href='?p=salir'>Salir</a>
					</ul>
				</nav>

			<?php
				} else { echo "<nav><ul class='nav'> <a href='?p=login'> Iniciar Sesión</a></ul></nav>"; }
			?>
      <button class="btn btn-sidenav btn-icon" onclick="openNav()"><i class='far fa-ellipsis-v'></i></button>
    </div>
  </header>

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