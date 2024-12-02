<?php
$items = (new Carrito())->get_carrito();
?>

<div class="d-flex justify-content-center p-5">
    <div>
        <div class="container">
            <h1 class="text-center mb-5 fw-bold">Panel de Usuario</h1>
            <div class="border rounded p-3 mb-4">
                <div class="row">
                    <div class="col-12">
                        <section>
                            <h2>Datos del usuario</h2>
                        </section>

                        <section>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Imagen</th>
                                        <th scope="col">Datos del producto</th>
                                        <th scope="col">Cantidad</th>
                                        <th class="text-end">Precio Unitario</th>
                                        <th class="text-end">Subtotal</th>
                                        <th class="text-end"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?PHP foreach ($items as $key => $item) { ?>
                                        <tr>
                                            <td><img src="img/perfumes/<?= $item['imagen'] ?>" alt="Perfume: <?= $item['nombre'] ?>" class="img-fluid rounded shadow-sm" style="width: 50%; max-width: 100%; height: auto;"></td>
                                            <td class="align-middle">
                                                <h2 class="h5"><?= $item['nombre'] ?></h2>                                
                                            </td>
                                            <td class="align-middle">
                                                <span class="text-end"><?= $item['cantidad'] ?></span>
                                            </td>
                                            <td class="text-end align-middle">
                                                <p class="h5 py-3">$<?= number_format($item['precio'], 2, ",", ".") ?></p>
                                            </td>
                                            <td class="text-end align-middle">
                                                <p class="h5 py-3">$<?= number_format($item['cantidad'] * $item['precio'], 2, ",", ".") ?></p>
                                            </td>
                                        </tr>
                                    <?PHP } ?>
                                    <tr>
                                        <td colspan="4" class="text-end">
                                            <h2 class="h5 py-3">Total:</h2>
                                        </td>
                                        <td class="text-end">
                                            <p class="h5 py-3">$<?= number_format((new Carrito())->precio_total(), 2, ",", ".") ?></p>
                                        </td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </section>

                        <form action="admin/actions/checkout_acc.php" method="POST" enctype="multipart/form-data">
                            <div class="row my-5 justify-content-center">
                                <div class="col-md-6">
                                    <div class="card p-5 sombra-form m-5">
                                        <h2>Información de Envio</h2>
                                        <div class="mb-2">
                                            <label for="nombreComprador">Nombre Completo</label>
                                            <input type="text" class="form-control" name="nombreComprador" placeholder="Ej: Julian Gonzalez" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="mail">Mail</label>
                                            <input type="text" class="form-control" name="mail" placeholder="Ej: JulianGonzalez@hotmail.com" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="direccion">Dirección</label>
                                            <textarea name="direccion" id="direccion" class="form-control" placeholder="Escriba su direccion aqui" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card p-5 sombra-form m-5">
                                        <h2>Datos de Pago</h2>
                                        <div class="mb-2">
                                            <label for="numeroTarjeta">Numero de la tarjeta</label>
                                            <input type="text" class="form-control" id="numeroTarjeta" name="numeroTarjeta" placeholder="xxxx-xxxx-xxxx-xxxx" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="nombreTarjeta">Nombre completo del titular</label>
                                            <input type="text" class="form-control" id="nombreTarjeta" name="nombreTarjeta" placeholder="" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="codigo" class="form-label">Código</label>
                                            <input type="password" class="form-control" id="codigo" name="codigo" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="pago" class="form-label">Método de Pago</label>
                                            <select class="form-select" name="pago" id="pago" required>
                                                <option value="" selected disabled>Elija una opcion</option>
                                                <option value="debito">Débito</option>
                                                <option value="credito">Crédito</option>
                                                <option value="efectivo">Efectivo</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn bg-primary text-white w-25">Pagar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>