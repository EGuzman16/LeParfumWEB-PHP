<?php
require_once "../../functions/autoload.php";

$postData = $_POST;
$fileData = $_FILES['imagen'];
$id = $_GET['id'] ?? FALSE;

try {
    $marca = (new Marca)->get_x_id($id);
    $imagen = $postData['imagen_or'];  // Por defecto, quedarse con la imagen original

    if (!empty($fileData['tmp_name'])) {
        // El usuario decidió reemplazar la imagen
        $imagenData = (new Imagen())->subirImagen(__DIR__ . "/../../img/marcas", $fileData);
        $imagen = $imagenData['nombre'];

        // Borrar la imagen original si existe
        if (!empty($postData['imagen_or'])) {
            (new Imagen())->borrarImagen(__DIR__ . "/../../img/marcas/" . $postData['imagen_or']);
        }
    }

    $marca->edit(
        $postData['nombre'],
        $postData['bio'],
        $imagen
    );

    (new Alerta())->add_alerta('warning', "Se editaron correctamente los datos");
    header('Location: ../index.php?sec=admin_marcas');
} catch (Exception $e) {
    (new Alerta())->add_alerta('danger', "Ocurrió un error no esperado, por favor llame al administrador de sistema.");
    header('Location: ../index.php?sec=admin_marcas');
}
?>
