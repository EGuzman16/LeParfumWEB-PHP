<?PHP
$disenadores = (new Disenador())->lista_completa();

?>
<div class="row my-5">
    <div class="col">

        <h1 class="text-center mb-5 fw-bold">Administración de Diseñadores</h1>
        <div class="row mb-5 d-flex align-items-center">


            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" width="15%">Foto</th>
                        <th scope="col">Nombre</th>
                        <th scope="col" width="45%">Biografía</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?PHP foreach ($disenadores as $D) { ?>
                        <tr>
                            <td><img src="../img/disenadores/<?= $D->getFoto_perfil() ?>" alt="Foto de <?= $D->getNombre_completo() ?>" class="img-fluid rounded shadow-sm"></td>
                            <td><?= $D->getNombre_completo() ?></td>
                            <td><?= $D->getBiografia() ?></td>
                            <td>
                                <a href="index.php?sec=edit_disenador&id=<?= $D->getId() ?>" role="button" class="d-block btn btn-sm bg-success text-white mb-1">Editar</a>
                                <a href="index.php?sec=delete_disenador&id=<?= $D->getId() ?>" role="button" class="d-block btn btn-sm bg-warning">Eliminar</a>
                            </td>
                        </tr>
                    <?PHP } ?>
                </tbody>
            </table>

            <a href="index.php?sec=add_disenador" class="btn bg-primary text-white mt-5"> Cargar nuevo Diseñador</a>
        </div>


    </div>
</div>