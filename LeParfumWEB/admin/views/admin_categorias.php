<?PHP
$categorias = (new Categoria)->lista_completa();

?>

<h1 class="text-center mb-5 fw-bold">Administración de categorías</h1>
<div class="row mb-5 d-flex align-items-center">


    <div>
        <?= (new Alerta())->get_alertas(); ?>
    </div>

    <table class="table">

        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?PHP foreach ($categorias as $C) { ?>
                <tr>
                    <td><?= $C->getNombre() ?></td>
                    <td>
                        <a href="index.php?sec=edit_categoria&id=<?= $C->getId() ?>" role="button" class=" btn btn-sm bg-success text-white">Editar</a>
                        <a href="index.php?sec=delete_categoria&id=<?= $C->getId() ?>" role="button" class=" btn btn-sm bg-warning">Eliminar</a>
                    </td>
                </tr>
            <?PHP } ?>
        </tbody>

    </table>
    <a href="index.php?sec=add_categoria" class="btn bg-primary text-white mt-5">Cargar</a>
</div>