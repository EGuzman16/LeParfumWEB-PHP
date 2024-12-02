<?php
$id = $_GET['id'] ?? false;

$perfume = (new Perfume())->producto_x_id($id);
?>

<div class="container">
    <div class="row justify-content-center mt-5">

        <?php if (!empty($perfume)) { ?>
            <div class="col-md-8"> <!-- Puedes probar con col-md-10 para mayor ancho -->
                <div>
                    <div class="row g-0">
                        <div class="col-md-5">
                            <img src="img/perfumes/<?= $perfume->getImagen() ?>" class="img-fluid rounded-start border-end" alt=" Perfume: <?= $perfume->getNombre() ?>">
                        </div>
                        <div class="col-md-7 d-flex flex-column p-3">
                            <div class="card-body flex-grow-0">
                                <p class="fs-4 m-0 fw-bold text-secondary"><?= $perfume->GetMarca() ?></p>
                                <h1 class="card-title fs-2 mb-4"><?= $perfume->getNombre(); ?></h1>
                                <p class="card-text"><?= $perfume->getDescripcion() ?></p>
                            </div>

                            <ul class="list-group list-group-flush border-top border-bottom">

                            <li class="list-group-item">
                                    <h2 class="fs-5">Marca: <span class="text-secondary"><?= $perfume->getMarca(); ?></span></h2>
                                </li>

                                <li class="list-group-item">
                                    <h3 class="fs-5">Familia Olfativa: <span class="text-secondary"><?= $perfume->getFamilia(); ?></span></h3>
                                    <p class="text-dark fst-italic"><?= $perfume->getFamilia() ?></p>
                                </li>

                                <li class="list-group-item">
                                    <h3 class="fs-5">Diseñador: <span class="text-secondary"><?= $perfume->getDisenador(); ?></span></h3>
                                    <p class="text-dark fst-italic"><?= $perfume->getDescripcion(); ?></p>
                                </li>

                                <li class="list-group-item"><span class="fw-bold">Fecha:</span> <?= $perfume->getFecha() ?></li>


                                <li class="list-group-item">
                                    <h3 class="mb-3">Categorias</h3>
                                    <?PHP foreach ($perfume->getCategorias_secundarias() as $value) { ?>
                                        <div class="row pb-3 mb-3 border-bottom">
                                                <p><?= $value->getNombre(); ?></p>
                                            </div>
                                        </div>
                                    <?PHP  } ?>

                                </li>



                            </ul>

                            <div class="card-body flex-grow-0 mt-auto">
                                <div class="fs-3 mb-3 fw-bold text-center text-secondary">$<?= $perfume->precio_formateado() ?></div>

                                <form action="admin/actions/add_item_acc.php" method="GET" class="row">
                                    <div class="col-6 d-flex align-items-center">
                                        <label for="q" class="fw-bold me-2">Cantidad: </label>
                                        <input type="number" class="form-control" value="1" name="q" id="q">
                                    </div>
                                    <div class="col-6">
                                        <input type="submit" value="Comprar" class="btn btn-secondary w-100 fw-bold">
                                        <input type="hidden" value="<?= $id ?>" name="id" id="id">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php } else { ?>
            <div class="col-md-8"> <!-- Puedes probar con col-md-10 para mayor ancho -->
                <h2 class="text-center m-5">No se encontró el producto deseado.</h2>
            </div>
        <?php } ?>

    </div>
</div>
