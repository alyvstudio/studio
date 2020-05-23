<h1>Agregar Un Producto</h1>
<?php
check_admin();

if (isset($enviar)) {
	$name = clear($name);
	$price = clear($price);
	$descr = clear($descr);

	$imagen = "";

	if (is_uploaded_file($_FILES['img']['tmp_name'])) {
		$imagen = "archivo_" . rand(0, 1000) . ".png";
		move_uploaded_file($_FILES['img']['tmp_name'], "productos/" . $imagen);
	}

	$mysqli->query("INSERT INTO products (name,price,descr,img) VALUES ('$name', '$price', '$descr', '$imagen')");
	alert("Producto Agregado");
	redir("?p=products");
}
?>

<form method="post" action="" enctype="multipart/form-data">
	<fieldset class="fieldset">
		<div class="margin-top-8">
			<input type="text" name="name" class="input" placeholder="Nombre del producto">
		</div>

		<div class="margin-top-8">
			<input type="text" name="price" class="input" placeholder="Precio del producto">
		</div>

		<div class="margin-top-8">
			<input type="textarea" name="descr" class="input" placeholder="Add description here...">
		</div>

		<div class="margin-top-8">
			<label for="img" class="form-label">Suba la imágen del producto</label>
			<div class="form-controls">
				<input type="file" class="btn" name="img" title="Imagen del producto" placeholder="Imagen del producto"/>
			</div>
		</div>

		<div class="margin">
			<button class="btn btn-primary" name="enviar" type="submit"><span class="fad fa-check"></span> Agregar Producto</button>
		</div>
	</fieldset>
</form>