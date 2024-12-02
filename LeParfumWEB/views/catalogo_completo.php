<?PHP

$catalogo = (new Perfume())->catalogo_completo();

$generos = (new Categoria())->listar_generos();

$marcas = (new Marca())->listar_marcas();

$disenadores = (new Disenador())->listar_disenadores();
?>

<!-- Carrusel -->
<div id="carruselProductos" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-bs-target="#carruselProductos" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#carruselProductos" data-bs-slide-to="1"></li>
        <li data-bs-target="#carruselProductos" data-bs-slide-to="2"></li>
    </ol>

    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/CarruselProductos/perfume.webp" class="d-block w-100" alt="Perfume">
        </div>
        <div class="carousel-item">
            <img src="img/CarruselProductos/perfume1.webp" class="d-block w-100" alt="perfume1">
        </div>
        <div class="carousel-item">
            <img src="img/CarruselProductos/perfume2.webp" class="d-block w-100" alt="perfume2">
        </div>
    </div>

    <a class="carousel-control-prev" href="#carruselProductos" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#carruselProductos" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
    </a>
</div>

<div class="container-fluid"> 
<div class="row">    
<div class=" d-flex justify-content-center p-5">
<aside class="col-md-3 col-lg-2 d-md-block sidebar" style="background-color: #f8f3f0;">


<span style="font-size: 2rem; text-decoration: underline; font-weight: bold;">Categorías</span>
<ul>
<?PHP foreach ($generos as $pagina) { ?>

<li class="dropdown-item">
    <a class="nav-link" href="index.php?sec=perfumes&per=<?= $pagina['id'] ?>"><?= $pagina['nombre'] ?></a>
</li>
<?PHP } ?>
</ul>

<span style="font-size: 2rem; text-decoration: underline; font-weight: bold;">Marcas</span>
<ul>
<?PHP foreach ($marcas as $p) { ?>

<li class="dropdown-item">
    <a class="nav-link" href="index.php?sec=marcas&marca=<?= $p['id'] ?>"><?= $p['nombre_completo'] ?></a>
</li>
<?PHP } ?>
</ul>

<span style="font-size: 2rem; text-decoration: underline; font-weight: bold;">Diseñadores</span>
<ul>
<?PHP foreach ($disenadores as $p) { ?>

<li class="dropdown-item">
    <a class="nav-link" href="index.php?sec=disenadores&disenador=<?= $p['id'] ?>"><?= $p['nombre_completo'] ?></a>
</li>
<?PHP } ?>
</ul>



    </aside>
        <div>
        <h1 class="text-center mb-5 fw-bold">Nuesto catálogo completo </h1>
        <div class="container">

            <?PHP if (!empty($catalogo)) { ?>
                <div class="row">

                    <?PHP foreach ($catalogo as $perfume) { 
                        
                        ?>

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

            <?PHP } else { ?>
                <div class="row">
                    <div class="col-12 text-secondary text-center h1"> No se encontró producto en stock</div>
                </div>
            <?PHP }  ?>
        </div>

    </div>
</div>
</div>
</div>