<div class="prd-container">
<?php
check_user("products");

if (isset($agregar) && ($cant)) {

	$idp = clear($agregar);
	$cant = clear($clear);
	$id_cliente = clear($_SESSION['id_cliente']);

	// variable "$q" = variable "$mysqli" -> query (requiere o requerimiento) ("INSERTAR EN carro(tabla de la base de datos) valores ($tal, $tal)");
	$q = $mysqli->query("INSERT INTO carro (id_cliente, id_producto, cantidad) VALUES($id_cliente, $idp, $cant)");
	alert("Se ha agregado al carro de compras");
	redir("?p=products");
}

$q = $mysqli->query("SELECT * FROM products ORDER BY id DESC");
while ($r = mysqli_fetch_array($q)) {
	?>

		<div class="card">
			<div class="card-header"><img src="productos/<?=$r['img']?>" width="200px" alt=""></div>
			<div class="card-body">
				<h4><?=$r['name']?></h4>
				<p><?=$r['descr']?></p>
				<table class="card-table">
					<th>Precio: </th> <td><?=$r['price']?> <?=$divisa?></td>
					<tr></tr>
					<th>Estado:</th> <td></td>
				</table>
			</div>
			<div class="card-footer">
				<div class="button-group-flex">
					<button class="btn btn-primary" onclick="add_cart('<?=$r['id']?>');"><i class="fad fa-shopping-cart"></i> Agregar</button>
				</div>
			</div>
		</div>
	<?php
}
?>
</div>

<script type="text/javascript">
	function add_cart(idp) {
		var cant = prompt("¿Qué Cantidad desea agregar?", 1);

		if(cant.length>0) {
			window.location="?p=products&agregar="+idp+"&cant="+cant;
		}
	}
</script>