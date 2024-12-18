<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Agregar un nueva marca</h1>
        <div class="row mb-5 d-flex align-items-center">

            <form class="row g-3" action="actions/add_marca_acc.php" method="POST" enctype="multipart/form-data">

            <div class="col-md-6 mb-3">
                    <label for="imagen" class="form-label">Imagen</label>
                    <input class="form-control" type="file" id="imagen" name="imagen" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="bio" class="form-label">Biografia</label>
                    <textarea class="form-control" id="bio" name="bio"></textarea>
                </div>

                <button type="submit" class="btn bg-primary text-white">Cargar</button>

            </form>

        </div>
    </div>

</div>