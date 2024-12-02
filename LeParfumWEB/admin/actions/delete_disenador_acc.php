<?php
require_once "../../functions/autoload.php";

$id = isset($_GET['id']) ? (int)$_GET['id'] : false;

// Validar el ID
if ($id <= 0) {
    // Manejar el caso en el que el ID no sea válido
    echo "ID no válido";

    exit;
}

try {
    $disenador = (new Disenador())->get_x_id($id);
    $disenador->delete();
    if (!empty($disenador->getFoto_perfil())) {
        (new Imagen())->borrarImagen(__DIR__ . "/../../img/disenadores/" . $disenador->getFoto_perfil());
    }

    (new Alerta())->add_alerta('danger', "Se eliminó correctamente el diseñador " . $disenador->getNombre_completo());
    header('Location: ../index.php?sec=admin_disenadores');
} catch (Exception $e) {
    // die("No se pudo eliminar el diseñador =(");
    (new Alerta())->add_alerta('danger', "Ocurrió un error no esperado por favor llame al administrador de sistema.");
    header('Location: ../index.php?sec=admin_disenadores');
}
?>
