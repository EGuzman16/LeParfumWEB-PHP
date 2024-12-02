<?php
$id = $_GET['id'] ?? FALSE;
$perfume = (new Perfume())->producto_x_id($id);
$ct_selected = $perfume->getCategorias_secundarias_ids();

$familias = (new Familia())->lista_completa();
$categorias = (new Categoria())->lista_completa();
$disenadores = (new Disenador())->lista_completa();
$marcas = (new Marca())->lista_completa();
?>

<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Editar datos de: <span class="text-secondary"><?= $perfume->getNombre() ?><span></h1>
        <div class="row mb-5 d-flex align-items-center">
            <form class="row g-3" action="actions/edit_perfume_acc.php?id=<?= $perfume->getId() ?>" method="POST" enctype="multipart/form-data">
                <div class="col-md-6 mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required value="<?= $perfume->getNombre() ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="familia_id" class="form-label">Familia</label>
                    <select class="form-select" name="familia_id" id="familia_id" required>
                        <option value="" selected disabled>Elija una opción</option>
                        <?php foreach ($familias as $F) { ?>
                            <option value="<?= $F->getId() ?>" <?= $perfume->getFamilia() instanceof Familia && $F->getId() == $perfume->getFamilia()->getId() ? "selected" : "" ?>>
                                <?= $F->getNombre() ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="categoria_principal_id" class="form-label">Categoria Principal</label>
                    <select class="form-select" name="categoria_principal_id" id="categoria_principal_id" required>
                        <option value="" selected disabled>Elija una opción</option>
                        <?php foreach ($categorias as $C) { ?>
                            <option value="<?= $C->getId() ?>" <?= $perfume->getCategoria_principal() instanceof Categoria && $C->getId() == $perfume->getCategoria_principal()->getId() ? "selected" : "" ?>>
                                <?= $C->getNombre() ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="imagen_og" class="form-label">Imagen Actual</label>
                    <img src="../img/perfumes/<?= $perfume->getImagen() ?>" alt="Perfume: <?= $perfume->getNombre() ?>" class="img-fluid rounded shadow-sm d-block">
                    <input class="form-control" type="hidden" id="imagen_og" name="imagen_og" required value="<?= $perfume->getImagen() ?>">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="imagen" class="form-label">Reemplazar Imagen</label>
                    <input class="form-control" type="file" id="imagen" name="imagen">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="fecha" class="form-label">Año</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" required value="<?= $perfume->getFecha() ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="disenador_id" class="form-label">Diseñador</label>
                    <select class="form-select" name="disenador_id" id="disenador_id" required>
                        <option value="" selected disabled>Elija una opción</option>
                        <?php foreach ($disenadores as $D) { ?>
                            <option value="<?= $D->getId() ?>" <?= $perfume->getDisenador() instanceof Disenador && $D->getId() == $perfume->getDisenador()->getId() ? "selected" : "" ?>>
                                <?= $D->getNombre_completo() ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="marca_id" class="form-label">Marca</label>
                    <select class="form-select" name="marca_id" id="marca_id" required>
                        <option value="" selected disabled>Elija una opción</option>
                        <?php foreach ($marcas as $M) { ?>
                            <option value="<?= $M->getId() ?>" <?= $perfume->getMarca() instanceof Marca && $M->getId() == $perfume->getMarca()->getId() ? "selected" : "" ?>>
                                <?= $M->getNombre_completo() ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="pais" class="form-label">Pais</label>
                    <select class="form-select" name="pais" id="pais" required>
                        <option value="" selected disabled>Elija una opción</option>
                        <option <?= $perfume->getPais() == "Estados Unidos" ? "selected" : "" ?>>Estados Unidos</option>
                        <option <?= $perfume->getPais() == "Francia" ? "selected" : "" ?>>Francia</option>
                        <option <?= $perfume->getPais() == "Italia" ? "selected" : "" ?>>Italia</option>
                        <option <?= $perfume->getPais() == "España" ? "selected" : "" ?>>España</option>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="proveedor" class="form-label">Proveedor</label>
                    <input type="text" class="form-control" id="proveedor" name="proveedor" required value="<?= $perfume->getProveedor() ?>">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="precio" name="precio" required value="<?= $perfume->getPrecio() ?>">
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label d-block">Categorias Secundarias</label>
                    <?php foreach ($categorias as $C) { ?>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="categorias_secundarias[]" id="categorias_secundarias_<?= $C->getId() ?>" value="<?= $C->getId() ?>" <?= in_array($C->getId(), $ct_selected) ? "checked" : "" ?>>
                            <label class="form-check-label mb-2" for="categorias_secundarios_<?= $C->getId() ?>"><?= $C->getNombre() ?></label>
                        </div>
                    <?php } ?>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="descripcion" class="form-label">Descripcion</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="7"><?= $perfume->getDescripcion() ?></textarea>
                </div>

                <button type="submit" class="btn bg-warning text-white">Editar</button>
            </form>
        </div>
    </div>
</div>