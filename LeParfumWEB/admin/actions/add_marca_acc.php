<?php
require_once "../../functions/autoload.php";

$postData = $_POST;
$datosArchivo = $_FILES['imagen'];

try {
    $imagenData = (new Imagen())->subirImagen(__DIR__ . "/../../img/marcas", $datosArchivo);

    (new Marca())->insert(
        $postData['nombre'],
        $postData['bio'],
        $imagenData['nombre']  
    );

    (new Alerta())->add_alerta('success', "La Marca <strong>{$postData['nombre']}</strong> se cargó correctamente");
    header('Location: ../index.php?sec=admin_marcas');

} catch (Exception $e) {
    //echo "<pre>";
   //print_r($e);
   // echo "</pre>";
    die("No se pudo cargar la marca");
    (new Alerta())->add_alerta('danger', "Ocurrió un error no esperado, por favor llame al administrador del sistema.");
    header('Location: ../index.php?sec=admin_marcas');
}
?>
