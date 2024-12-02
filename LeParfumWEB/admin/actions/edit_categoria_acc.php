<?php
require_once "../../functions/autoload.php";

$postData = $_POST;
$id = $_GET['id'] ?? false;

try {
    $categoria = (new Categoria())->get_x_id($id);

    $categoria->edit($postData['nombre']);

    (new Alerta())->add_alerta('warning', "Se editaron correctamente los datos");
    header('Location: ../index.php?sec=admin_categorias');
} catch (Exception $e) {

    (new Alerta())->add_alerta('danger', "Ocurrió un error no esperado, por favor llame al administrador de sistema.");
    header('Location: ../index.php?sec=admin_categorias');
}
