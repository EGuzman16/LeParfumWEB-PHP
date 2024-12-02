<?PHP
$id_disenador = $_GET['disenador'] ?? FALSE;


$disenador = (new Disenador())->get_x_id($id_disenador);

$nombre = $disenador->getNombre_completo(TRUE);
$foto = $disenador->getFoto_perfil(TRUE);
$bio = $disenador->getBiografia(TRUE);

/*cataálogo de este categoría*/
$catalogo = (new Perfume())->catalogo_x_disenador($id_disenador);

?>
<div class=" d-flex justify-content-center p-5">
    <div class="container">

        <h1 class="text-center mb-5 fw-bold">Nuestro Catálogo del Perfumista <span class="text-secondary"><?= $nombre ?></span></h1>
<div class="text-center">
<img src="img/disenadores/<?= $foto ?>" alt="<?= $nombre ?>">
<p><?= $bio ?></p>
</div>
        <div class="row">

            <?PHP foreach ($catalogo as $perfume) { ?>
                <div class="col-12 col-md-4">
                            <div class="card mb-3">
                                <img src="img/perfumes/<?= $perfume->getImagen()?>" class="card-img-top" alt="Perfume: <?= $perfume->getNombre() ?>">
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
                                    <a href="index.php?sec=producto&id=<?= $perfume->getId()?>" class="btn btn-secondary w-100 fw-bold">Ver más</a>
                                </div>
                            </div>
                        </div>
            <?PHP } ?>

        </div>

    </div>

</div>