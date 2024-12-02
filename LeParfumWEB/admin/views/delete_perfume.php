<?PHP
$id = $_GET['id'] ?? FALSE;
$perfume = (new Perfume())->producto_x_id($id);
?>

<div class="row my-5 g-3">
	<h1 class="text-center mb-5 fw-bold">¿Está seguro que desea eliminar este Perfume?</h1>
	<div class="col-12 col-md-6">
		<img src="../img/perfumes/<?= $perfume->getImagen() ?>" alt="Perfume: <?= $perfume->getNombre() ?>" class="img-fluid rounded shadow-sm d-block mx-auto mb-3">
	</div>

	<div class="col-12 col-md-6">


		<h2 class="fs-6">Nombre</h2>
		<p><?= $perfume->getNombre() ?></p>


		<a href="actions/delete_perfume_acc.php?id=<?= $perfume->getId() ?>" role="button" class="d-block btn btn-sm bg-danger text-white mt-4">Eliminar</a>
	</div>



</div>