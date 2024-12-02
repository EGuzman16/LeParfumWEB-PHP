<?php
require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? false;

try {
    $categoria = (new Categoria())->get_x_id($id);
    $categoria->delete();

    (new Alerta())->add_alerta('danger', "Se eliminó correctamente la categoría " . $categoria->getNombre());
    header('Location: ../index.php?sec=admin_categorias');
} catch (Exception $e) {
    
    (new Alerta())->add_alerta('danger', "Ocurrió un error inesperado, por favor póngase en contacto con el administrador del sistema.");
    header('Location: ../index.php?sec=admin_categorias');
}
