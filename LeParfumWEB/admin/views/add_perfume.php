<?PHP

$familias = (new Familia())->lista_completa();
$categorias = (new Categoria())->lista_completa();
$disenadores = (new Disenador())->lista_completa();
$marca = (new Marca())->lista_completa();

?>

<div class="row my-5">
	<div class="col">

		<h1 class="text-center mb-5 fw-bold">Administración de Productos</h1>
		<div class="row mb-5 d-flex align-items-center">

			<form class="row g-3" action="actions/add_perfume_acc.php" method="POST" enctype="multipart/form-data">

				<div class="col-md-6 mb-3">
					<label for="nombre" class="form-label">Nombre</label>
					<input type="text" class="form-control" id="nombre" name="nombre" required>
				</div>

				<div class="col-md-6 mb-3">
					<label for="familia_id" class="form-label">Familia Olfativa</label>
					<select class="form-select" name="familia_id" id="familia_id" required>
						<option value="" selected disabled>Elija una opción</option>
						<?PHP foreach ($familias as $F) { ?>
							<option value="<?= $F->getId() ?>"><?= $F->getNombre() ?></option>
						<?PHP } ?>
					</select>
				</div>

				<div class="col-md-4 mb-3">
					<label for="categoria_principal_id" class="form-label">Categoria Principal</label>
					<select class="form-select" name="categoria_principal_id" id="categoria_principal_id" required>
						<option value="" selected disabled>Elija una opción</option>
						<?PHP foreach ($categorias as $C) { ?>
							<option value="<?= $C->getId() ?>"><?= $C->getNombre() ?></option>
						<?PHP } ?>
					</select>
				</div>


				<div class="col-md-6 mb-3">
					<label for="imagen" class="form-label">Imagen</label>
					<input class="form-control" type="file" id="imagen" name="imagen" required multiple>
				</div>

				<div class="col-md-6 mb-3">
					<label for="fecha" class="form-label">Año lanzamiento</label>
					<input type="date" class="form-control" id="fecha" name="fecha" required>
				</div>

				<div class="col-md-6 mb-3">
					<label for="disenador_id" class="form-label">Diseñador</label>
					<select class="form-select" name="disenador_id" id="disenador_id" required>
						<option value="" selected disabled>Elija una opción</option>
						<?PHP foreach ($disenadores as $D) { ?>
							<option value="<?= $D->getId() ?>"><?= $D->getNombre_completo() ?></option>
						<?PHP } ?>
					</select>
				</div>

				<div class="col-md-6 mb-3">
					<label for="marca_id" class="form-label">Marca</label>
					<select class="form-select" name="marca_id" id="marca_id" required>
						<option value="" selected disabled>Elija una opción</option>
						<?PHP foreach ($marca as $M) { ?>
							<option value="<?= $M->getId() ?>"><?= $M->getNombre_completo() ?></option>
						<?PHP } ?>
					</select>
				</div>

				<div class="col-md-4 mb-3">
					<label for="pais" class="form-label">País</label>
					<select class="form-select" name="pais" id="pais" required>
						<option value="" selected disabled>Elija una opción</option>
						<option>Estados Unidos</option>
						<option>Francia</option>
						<option>Italia</option>
						<option>España</option>
					</select>
				</div>

				<div class="col-md-4 mb-3">
					<label for="proveedor" class="form-label">Proveedor</label>
					<input type="text" class="form-control" id="proveedor" name="proveedor" required>
				</div>


				<div class="col-md-4 mb-3">
					<label for="precio" class="form-label">Precio</label>
					<input type="number" class="form-control" id="precio" name="precio" required>
				</div>


				<div class="col-md-12 mb-3">
					<label class="form-label d-block">Categorías Secundarias</label>
					<?PHP foreach ($categorias as $C) {	?>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" name="categorias_secundarias[]" id="categorias_secundarias_<?= $C->getId() ?>" value="<?= $C->getId() ?>" >
							<label class="form-check-label mb-2" for="categorias_secundarias_<?= $C->getId() ?>"><?= $C->getNombre() ?></label>
						</div>
					<?PHP } ?>
				</div>


				<div class="col-md-12 mb-3">
					<label for="descripcion" class="form-label">Descripción</label>
					<textarea class="form-control" id="descripcion" name="descripcion" rows="7"></textarea>
				</div>


				<button type="submit" class="btn bg-primary text-white">Cargar</button>
			</form>
		</div>
	</div>
</div>