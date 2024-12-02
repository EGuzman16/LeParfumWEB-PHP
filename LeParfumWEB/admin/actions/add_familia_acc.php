<?php
require_once "../../functions/autoload.php";

$postData = $_POST;

try {
    (new Familia())->insert(
        $postData['nombre']
    );

    (new Alerta())->add_alerta('success', "La familia olfativa <strong>{$postData['nombre']}</strong> se cargó correctamente");
    header('Location: ../index.php?sec=admin_familias');
} catch (Exception $e) {
    echo "<pre>";
    print_r($e);
    echo "</pre>";
    die("No se pudo cargar la familia olfativa");
    (new Alerta())->add_alerta('danger', "Ocurrió un error inesperado, por favor póngase en contacto con el administrador del sistema.");
    header('Location: ../index.php?sec=admin_familias');
}