<?PHP
require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;

try {

    $perfume = (new Perfume())->producto_x_id($id);

    (new Imagen())->borrarImagen(__DIR__ . "/../../img/perfumes/" . $perfume->getImagen());
    $perfume->clear_categorias_sec();
    $perfume->delete();
    
    
    header('Location: ../index.php?sec=admin_perfumes');

}catch (Exception $e) {
      //echo "<pre>";
     // print_r($e->getMessage());
     //echo "<pre>";
     // die("No se pudo eliminar el perfume");
    (new Alerta())->add_alerta('danger', "Ocurrió un error no esperado, por favor llame al administrador de sistema.");
    header('Location: ../index.php?sec=admin_perfumes');
}