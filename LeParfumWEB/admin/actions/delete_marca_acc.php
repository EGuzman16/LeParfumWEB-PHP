<?PHP
require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;

try {
    $marca = (new Marca)->get_x_id($id);
    $marca->delete();
    if (!empty($marca->getImagen())) {
        (new Imagen())->borrarImagen(__DIR__ . "/../../img/marcas/" . $marca->getImagen());
    }
    
    (new Alerta())->add_alerta('danger', "Se eliminó correctamente la marca " . $marca->getNombre_completo());
    header('Location: ../index.php?sec=admin_marcas');
} catch (Exception $e) {
    // die("No se pudo eliminar el marca ");
    (new Alerta())->add_alerta('danger', "Ocurrió un error no esperado por favor llame al administrador de sistema.");
    header('Location: ../index.php?sec=admin_marcas');
}
