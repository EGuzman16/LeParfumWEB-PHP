<?PHP
$items = (new Carrito())->get_carrito();
?>

<h1 class="text-center fs-2 my-5"> Carrito de Compras</h1>
<div class="container my-4">

    <?PHP if (count($items)) { ?>
        <form action="admin/actions/update_items_acc.php" method="POST">

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
                                <label for="q_<?= $key ?>" class="visually-hidden">Cantidad</label>
                                <input type="number" class="form-control" value="<?= $item['cantidad'] ?>" id="q_<?= $key ?>" name="q[<?= $key ?>]">
                            </td>
                            <td class="text-end align-middle">
                                <p class="h5 py-3">$<?= number_format($item['precio'], 2, ",", ".") ?></p>
                            </td>
                            <td class="text-end align-middle">
                                <p class="h5 py-3"> $<?= number_format($item['cantidad'] * $item['precio'], 2, ",", ".") ?></p>
                            </td>
                            <td class="text-end align-middle">
                                <a href="admin/actions/remove_item_acc.php?id=<?= $key ?>" class="btn btn-sm btn-danger">Eliminar</a>
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



            <div class="d-flex justify-content-end gap-2">
                <input type="submit" value="Actualizar Cantidades" class="btn btn-warning bg-warning">
                <a href="index.php?sec=catalogo_completo" role="button" class=" btn btn-secondary bg-secondary text-white">Seguir comprando</a>
                <a href="admin/actions/clear_items_acc.php" role="button" class="btn btn-info bg-info text-white">Vaciar Carrito</a>
                <a href="index.php?sec=finalizar_pago" role="button" class="btn btn-primary bg-primary text-white">Finalizar Compra</a>
            </div>

        </form>
    <?PHP } else { ?>
        <h2 class="text-center mb-5 text-secondary">Tu carrito está vacio</h2>
    <?PHP } ?>


</div>