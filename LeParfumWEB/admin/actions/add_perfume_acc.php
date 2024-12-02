<?php
require_once "../../functions/autoload.php";

$postData = $_POST;
$datosArchivo = $_FILES['imagen'];

try {
    $imagenData = (new Imagen())->subirImagen(__DIR__ . "/../../img/perfumes", $datosArchivo);

    (new Perfume())->insert(
        $postData['nombre'],
        $postData['categoria_principal_id'],
        $postData['familia_id'],
        $postData['disenador_id'],
        $postData['marca_id'],
        $postData['fecha'],
        $postData['pais'],
        $postData['proveedor'],
        $postData['descripcion'],
        $imagenData['nombre'],
        $postData['precio']
    );

    (new Alerta())->add_alerta('success', "El Perfume <strong>{$postData['nombre']}</strong> se cargó correctamente");
    header('Location: ../index.php?sec=admin_perfumes');

} catch (Exception $e) {
    //   echo "<pre>";
    //   print_r($e);
    //   echo "</pre>";
    die("No se pudo cargar el perfume");
    (new Alerta())->add_alerta('danger', "Ocurrió un error no esperado, por favor llame al administrador del sistema.");
    header('Location: ../index.php?sec=admin_perfumes');
}
?>
