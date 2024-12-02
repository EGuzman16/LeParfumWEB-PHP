<?PHP
$id = $_GET['id'] ?? FALSE;
$familia = (new Familia())->get_x_id($id);

?>
<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Editar el nombre de una familia olfativa</h1>
        <div class="row mb-5 d-flex align-items-center">
            <form class="row g-3" action="actions/edit_familia_acc.php?id=<?= $familia->getId() ?>" method="POST" enctype="multipart/form-data">

                <div class="col-md-6 mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $familia->getNombre() ?>" required>
                </div>
                

                <button type="submit" class="btn bg-warning text-white">Editar</button>

            </form>
        </div>
    </div>
</div>