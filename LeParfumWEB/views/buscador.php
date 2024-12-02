<?php
require_once "functions/autoload.php";

if (isset($_GET['q'])) {
    $terminoBusqueda = $_GET['q'];


    $resultados = (new Perfume())->buscador($terminoBusqueda);

    
?>

    <div class="d-flex justify-content-center p-5">
        <div class="container">
            <h1 class="text-center mb-5 fw-bold">Resultados de la búsqueda</h1>

            <?php if (count($resultados) > 0) : ?>

                <div class="row">
                    <?php
                
                    foreach ($resultados as $perfume) :
                    ?>
                        <div class="col-12 col-md-4">
                            <div class="card mb-3">
                                <img src="img/perfumes/<?= $perfume->getImagen() ?>" class="card-img-top" alt="Perfume: <?= $perfume->getNombre() ?>">
                                <div class="card-body">
                                    <p class="fs-6 m-0 fw-bold text-secondary"><?= $perfume->GetMarca() ?></p>
                                    <h2 class="card-title"><?= $perfume->getNombre() ?></h2>
                                    <p class="card-text"><?= $perfume->descripcion_reducida() ?></p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><span class="fw-bold">Diseñador:</span> <?= $perfume->getDisenador() ?></li>
                                    <li class="list-group-item"><span class="fw-bold">Familia:</span> <?= $perfume->getFamilia() ?></li>
                                </ul>
                                <div class="card-body">
                                    <div class="fs-3 mb-3 fw-bold text-center text-secondary">$<?= $perfume->precio_formateado() ?></div>
                                    <a href="index.php?sec=producto&id=<?= $perfume->getId() ?>" class="btn btn-secondary w-100 fw-bold">Ver más</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>

            <?php else : ?>

                <div class="text-center">
                    <p class="fw-bold">No se encontraron resultados para el término buscado.</p>
                </div>

            <?php endif; ?>

        </div>
    </div>

<?php
    
} else {

    header('Location: catalogo_completo.php');
    exit;
}
?>

