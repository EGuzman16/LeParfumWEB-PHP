<?PHP
$id = $_GET['id'] ?? FALSE;
$disenador = (new Disenador())->get_x_id($id);

?>
<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Editar los datos de un Diseñador</h1>
        <div class="row mb-5 d-flex align-items-center">
            <form class="row g-3" action="actions/edit_disenador_acc.php?id=<?= $disenador->getId() ?>" method="POST" enctype="multipart/form-data">

                <div class="col-md-6 mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $disenador->getNombre_completo() ?>" required>
                </div>

                <div class="col-md-2 mb-3">
                    <label for="imagen" class="form-label">Imágen actual</label>
                    <img src="../img/disenadores/<?= $disenador->getFoto_perfil() ?>" alt="Logo: <?= $disenador->getNombre_completo() ?>" class="img-fluid rounded shadow-sm d-block">
                    <input class="form-control" type="hidden" id="imagen_or" name="imagen_or" value="<?= $disenador->getFoto_perfil() ?>">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="imagen" class="form-label">Reemplazar Imagen</label>
                    <input class="form-control" type="file" id="imagen" name="imagen">
                </div>

                <div class="col-md-12 mb-3">
                    <label for="bio" class="form-label">Biografia</label>
                    <textarea class="form-control" id="bio" name="bio"><?= $disenador->getBiografia() ?></textarea>
                </div>

                <button type="submit" class="btn bg-warning text-white">Editar</button>

            </form>
        </div>
    </div>
</div>