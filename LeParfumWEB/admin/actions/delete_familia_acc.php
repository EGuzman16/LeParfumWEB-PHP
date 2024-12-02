<?php
require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? false;

try {
    $familia = (new Familia())->get_x_id($id);

    if ($familia === null) {

        (new Alerta())->add_alerta('danger', "No se encontró la familia olfativa.");
        header('Location: ../index.php?sec=admin_familias');
        exit(); 
    }


    $familia->delete();

    (new Alerta())->add_alerta('danger', "Se eliminó correctamente la familia olfativa " . $familia->getNombre());
    header('Location: ../index.php?sec=admin_familias');
} catch (Exception $e) {
    (new Alerta())->add_alerta('danger', "Ocurrió un error inesperado, por favor póngase en contacto con el administrador del sistema.");
    header('Location: ../index.php?sec=admin_familias');
}
