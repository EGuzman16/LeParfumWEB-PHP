<?php
require_once "../../functions/autoload.php";

$postData = $_POST;
$fileData = $_FILES['imagen'];
$id = $_GET['id'] ?? FALSE;

try {
    $disenador = (new Disenador)->get_x_id($id);
    $imagen = $postData['imagen_or'];  // Por defecto, quedarse con la imagen original

    if (!empty($fileData['tmp_name'])) {
        // El usuario decidió reemplazar la imagen
        $imagenData = (new Imagen())->subirImagen(__DIR__ . "/../../img/disenadores", $fileData);
        $imagen = $imagenData['nombre'];

        // Borrar la imagen original si existe
        if (!empty($postData['imagen_or'])) {
            (new Imagen())->borrarImagen(__DIR__ . "/../../img/disenadores/" . $postData['imagen_or']);
        }
    }

    $disenador->edit(
        $postData['nombre'],
        $postData['bio'],
        $imagen
    );

    (new Alerta())->add_alerta('warning', "Se editaron correctamente los datos");
    header('Location: ../index.php?sec=admin_disenadores');
} catch (Exception $e) {
    (new Alerta())->add_alerta('danger', "Ocurrió un error no esperado, por favor llame al administrador de sistema.");
    header('Location: ../index.php?sec=admin_disenadores');
}
?>
