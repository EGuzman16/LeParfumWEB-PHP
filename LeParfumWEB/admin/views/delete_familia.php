<?PHP
$id = $_GET['id'] ?? FALSE;
$familia = (new Familia())->get_x_id($id);
?>

<div class="row my-5 g-3">
	<h1 class="text-center mb-5 fw-bold">¿Está seguro que desea eliminar esta familia olfativa?</h1>

	<div class="col-12 col-md-6">


		<h2 class="fs-6">Nombre</h2>
		<p><?= $familia->getNombre() ?></p>

		<a href="actions/delete_familia_acc.php?id=<?= $familia->getId() ?>" role="button" class="d-block btn btn-sm bg-danger text-white mt-4">Eliminar</a>
	</div>

</div>