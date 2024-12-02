<?php
require_once "../../functions/autoload.php";

$postData = $_POST;
$datosArchivo = $_FILES['imagen'];

try {
    $imagenData = (new Imagen())->subirImagen(__DIR__ . "/../../img/disenadores", $datosArchivo);

    (new Disenador())->insert(
        $postData['nombre'],
        $postData['bio'],
        $imagenData['nombre']  
    );

    (new Alerta())->add_alerta('success', "El diseñador<strong>{$postData['nombre']}</strong> se cargó correctamente");
    header('Location: ../index.php?sec=admin_disenadores');

} catch (Exception $e) {
    //  echo "<pre>";
    //   print_r($e);
    //  echo "</pre>";
    die("No se pudo cargar el diseñador");
    (new Alerta())->add_alerta('danger', "Ocurrió un error no esperado, por favor llame al administrador del sistema.");
    header('Location: ../index.php?sec=admin_disenadores');
}
?>
