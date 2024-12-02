<?php
// Obtener los 6 primeros productos
$perfume = new Perfume();
$catalogo = $perfume->catalogo_completo();
$primerosProductos = array_slice($catalogo, 0, 6);
?>

<!-- Header -->
<header style="background-image: url('img/header.webp');">
    <div class="header-content">
        <h1>LE PARFUM Web!</h1>
        <p>Tu tienda de perfumes</p>
        <a href="index.php?sec=catalogo_completo" class="btn">Comprar</a>
    </div>
</header>


<!-- Sección de Categorías -->
<section id="categorias" class="text-center">
    <h2 style="justify-content: center; margin-bottom: 02em;">Categorías</h2>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <a href="index.php?sec=perfumes&per=1">
                    <img src="img/Unisex.png" alt="Unisex" class="img-fluid">
                    <p>Unisex</p>
                </a>
            </div>
            <div class="col-md-3 col-sm-6">
            <a href="index.php?sec=perfumes&per=2">
                    <img src="img/Mujeres.png" alt="Mujeres" class="img-fluid">
                    <p>Mujeres</p>
                </a>
            </div>
            <div class="col-md-3 col-sm-6">
            <a href="index.php?sec=perfumes&per=3">
                    <img src="img/Hombres.png" alt="Hombres" class="img-fluid">
                    <p>Hombres</p>
                </a>
            </div>
            <div class="col-md-3 col-sm-6">
            <a href="index.php?sec=perfumes&per=4">
                    <img src="img/Ninos.png" alt="Niños" class="img-fluid">
                    <p>Niños</p>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Sección "Sobre nosotros" -->
<section id="sobre-nosotros" class="py-5">
    <div class="container">
        <div class="row no-gutters">
            <!-- Primera columna con la imagen -->
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <img src="img/sobrenosotros.jpg" alt="Sobre Nosotros" class="img-fluid">
            </div>
            <!-- Segunda columna con el contenido -->
            <div class="col-md-6">
                <h2>Sobre Nosotros</h2>
                <p>En LE PARFUM Web, nos enorgullece ofrecer una experiencia única para todos los amantes de las fragancias. Con años de dedicación y pasión, hemos creado un destino virtual donde la magia de los perfumes cobra vida. Nuestra misión es ayudarte a descubrir la fragancia perfecta que complemente tu estilo y personalidad, convirtiendo cada día en una experiencia olfativa memorable.</p>
                <p>Estamos dedicados a convertir cada fragancia en una experiencia sensorial inolvidable. Te invitamos a explorar nuestro mundo de aromas y a descubrir tu próxima firma olfativa. Tu historia personal merece una fragancia excepcional, y estamos aquí para ayudarte a encontrarla.</p>
                <a href="index.php?sec=nosotros" class="btn-link">Leer más</a>
            </div>
        </div>
    </div>
</section>

<!-- Sección Nuestros productos --> 
<section id="nuestros-productos" class="py-5">
    <div class="container">
        <div class="text-center">
            <h2 style="margin-bottom: 2em;">Nuestros Productos</h2>
        </div>
        <div class="container justify-content-center">

            <div class=" d-flex justify-content-center p-5">
    <div>
        <div class="container">

            <?PHP if (!empty($primerosProductos)) { ?>
                <div class="row">

                    <?PHP foreach ($primerosProductos as $perfume) { 
                        
                        ?>

                        <div class="col-12 col-md-4">
                            <div class="card mb-3">
                                <img src="img/perfumes/<?= $perfume->getImagen()?>" class="card-img-top" alt="Perfume: <?= $perfume->getNombre() ?>">
                                <div class="card-body">
                                    <p class="fs-6 m-0 fw-bold text-secondary"><?= $perfume->GetMarca() ?></p>
                                    <h3 class="card-title"><?= $perfume->getNombre() ?></h3>
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
                    <div class="col-12 text-danger text-center h1"> No se encontró el producto deseado.</div>
                </div>
            <?PHP }  ?>
        </div>

    </div>
</div>

            <div class="row justify-content-center" id="product-list"></div>

            <div class="text-center mt-4">
                <a href="index.php?sec=catalogo_completo" class="btn btn-secondary">Ver más productos</a>
            </div>

        </div>
    </div>
</section>



//<!-- Sección de Publicidad -->

<section id="publicidad" style="background-image: url('img/cupon.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-right">
                <div class="publicidad-content">
                    <h2>Vuelta a tus esenciales después del verano</h2>
                    <span>-10%</span>
                    <p>En perfumes EDP</p>
                    <div class="codigo-descuento">
                        <p>Código:</p>
                        <div class="codigo-borde">
                            <p id="codigo">PARFUM10</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


//<!-- Sección Ventajas -->

<section id="ventajas" class="py-5">
    <div class="container text-center">
        <h2>Nuestras Ventajas</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <i class="fas fa-truck fa-3x"></i>
                <p class="mt-3">Envío gratuito a partir de 25 Euros</p>
            </div>
            <div class="col-md-4 mb-4">
                <i class="fas fa-box fa-3x"></i>
                <p class="mt-3">Garantía de devolución</p>
            </div>
            <div class="col-md-4 mb-4">
                <i class="fas fa-user-shield fa-3x"></i>
                <p class="mt-3">Formas de pago seguras</p>
            </div>
        </div>
    </div>
</section>

<?PHP
include_once('includes/suscribir.php');
?>