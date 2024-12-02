<?PHP
$familias = (new Familia())->lista_completa();

?>
<div class="row my-5">
    <div class="col">

        <h1 class="text-center mb-5 fw-bold">Administración de Familias</h1>
        <div class="row mb-5 d-flex align-items-center">


            <table class="table">
                <thead>
                    <tr>
                        
                        <th scope="col">Nombre</th>                 
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?PHP foreach ($familias as $F) { ?>
                        <tr>
                            
                            <th scope="row"><?= $F->getNombre() ?></th>                            
                            <td>
                                <a href="index.php?sec=edit_familia&id=<?= $F->getId() ?>" role="button" class=" btn btn-sm bg-success text-white y  btn-auto">Editar</a>
                                <a href="index.php?sec=delete_familia&id=<?= $F->getId() ?>" role="button" class=" btn btn-sm bg-warning btn-auto">Eliminar</a>
                            </td>
                        </tr>
                    <?PHP } ?>
                </tbody>
            </table>

            <a href="index.php?sec=add_familia" class="btn bg-primary text-white mt-5"> Cargar</a>
        </div>


    </div>
</div>