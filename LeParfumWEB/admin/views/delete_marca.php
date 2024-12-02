<?PHP
$id = $_GET['id'] ?? FALSE;
$marca = (new Marca())->get_x_id($id);
?>

<div class="row my-5 g-3">
	<h1 class="text-center mb-5 fw-bold">¿Está seguro que desea eliminar esta Marca?</h1>
	<div class="col-12 col-md-6">
		<img src="../img/marcas/<?= $marca->getImagen() ?>" alt=" Logo de <?= $marca->getNombre_completo() ?>" class="img-fluid rounded shadow-sm d-block mx-auto mb-3">
	</div>

	<div class="col-12 col-md-6">


		<h2 class="fs-6">Nombre</h2>
		<p><?= $marca->getNombre_completo() ?></p>
		<h2 class="fs-6">Biografía</h2>
		<p><?= $marca->getBiografia() ?></p>

		<a href="actions/delete_marca_acc.php?id=<?= $marca->getId() ?>" role="button" class="d-block btn btn-sm bg-danger text-white mt-4">Eliminar</a>
	</div>
</div>