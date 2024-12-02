<?php
require_once "../../functions/autoload.php";

$postData = $_POST;
$fileData = $_FILES['imagen'];
$id = $_GET['id'] ?? FALSE;

try {
  
    $perfume = (new Perfume())->producto_x_id($id);
    $imagen = $postData['imagen_og'];  

    if (!empty($fileData['tmp_name'])) {
      
        $imagenData = (new Imagen())->subirImagen(__DIR__ . "/../../img/perfumes", $fileData);
        $imagen = $imagenData['nombre'];

        if (!empty($postData['imagen_og'])) {
            (new Imagen())->borrarImagen(__DIR__ . "/../../img/perfumes/" . $postData['imagen_og']);
        }
    }

  
    $perfume->edit(
        $id,
        $postData['nombre'],
        $postData['categoria_principal_id'],
        $postData['familia_id'],
        $postData['disenador_id'],
        $postData['marca_id'],
        $postData['fecha'],
        $postData['pais'],
        $postData['proveedor'],
        $postData['descripcion'],
        $imagen,
        $postData['precio']
    );


    $perfume->clear_categorias_sec();
    if (!empty($postData['categorias_secundarias'])) {
        foreach ($postData['categorias_secundarias'] as $categoria_id) {
            $perfume->add_categorias_sec($id, $categoria_id);
        }
    }


    (new Alerta())->add_alerta('success', "Se editaron correctamente los datos");
    header('Location: ../index.php?sec=admin_perfumes');
} catch (Exception $e) {

    (new Alerta())->add_alerta('danger', "Ocurrió un error no esperado, por favor llame al administrador de sistema.");
    header('Location: ../index.php?sec=admin_perfumes');
}
?>