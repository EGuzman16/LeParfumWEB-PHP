<?PHP
$perfumes = (new Perfume())->catalogo_completo();

?>
<style>
    .descripcion-fija {
        max-width: 200px;
        max-height: 200px;
        overflow: auto;
        white-space: nowrap;
    }
</style>

<div class="row my-5">
    <div class="col">

        <h1 class="text-center mb-5 fw-bold">Administración de Productos</h1>
        <div class="row mb-5 d-flex align-items-center">

            <div>
                <?= (new Alerta())->get_alertas(); ?>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" width="15%">Imagen</th>
                        <th scope="col" width="15%">Nombre</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Familia Olfativa</th>
                        <th scope="col">Diseñador</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?PHP foreach ($perfumes as $P) { ?>
                        <tr>
                            <td><img src="../img/perfumes/<?= $P->getImagen() ?>" alt="Perfume: <?= $P->getNombre() ?>" class="img-fluid rounded shadow-sm"></td>
                            <td><?= $P->getNombre() ?></td>
                            <td><?= $P->getMarca() ?></td>
                            <td>
                                <div class="descripcion-fija"><?= $P->getDescripcion() ?></div>
                            </td>
                            <td><?= $P->getFamilia() ?></td>
                            <td><?= $P->getDisenador() ?></td>
                            <td><?= $P->getMarca() ?></td>
                            <td>$<?= $P->getPrecio() ?></td>
                            <td>
                                <a href="index.php?sec=edit_perfume&id=<?= $P->getId() ?>" role="button" class="d-block btn btn-sm btn-success bg-success text-white mb-1">Editar</a>
                                <a href="index.php?sec=delete_perfume&id=<?= $P->getId() ?>" role="button" class="d-block btn btn-sm btn-warning bg-warning">Eliminar</a>
                            </td>
                        </tr>
                    <?PHP } ?>
                </tbody>
            </table>

            <a href="index.php?sec=add_perfume" class="btn btn-primary bg-primary text-white mt-5"> Cargar nuevo Producto</a>
        </div>


    </div>
</div>