<?PHP
$marcas = (new Marca())->lista_completa();

?>
<div class="row my-5">
    <div class="col">

        <h1 class="text-center mb-5 fw-bold">Administración de Marcas</h1>
        <div class="row mb-5 d-flex align-items-center">


            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" width="15%">Logo</th>
                        <th scope="col">Nombre</th>
                        <th scope="col" width="45%">Biografía</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?PHP foreach ($marcas as $M) { ?>
                        <tr>
                            <td><img src="../img/marcas/<?= $M->getImagen() ?>" alt="Logo de <?= $M->getNombre_completo() ?>" class="img-fluid rounded shadow-sm"></td>
                            <td><?= $M->getNombre_completo() ?></td>
                            <td><?= $M->getBiografia() ?></td>
                            <td>
                                <a href="index.php?sec=edit_marca&id=<?= $M->getId() ?>" role="button" class="d-block btn btn-sm bg-success text-white mb-1">Editar</a>
                                <a href="index.php?sec=delete_marca&id=<?= $M->getId() ?>" role="button" class="d-block btn btn-sm bg-warning">Eliminar</a>
                            </td>
                        </tr>
                    <?PHP } ?>
                </tbody>
            </table>

            <a href="index.php?sec=add_marca" class="btn bg-primary text-white mt-5"> Cargar nueva marca</a>
        </div>


    </div>
</div>