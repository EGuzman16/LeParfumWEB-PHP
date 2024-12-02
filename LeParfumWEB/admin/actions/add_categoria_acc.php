<?php
require_once "../../functions/autoload.php";

$postData = $_POST;

try {
    (new Categoria())->insert(
        $postData['nombre']
    );

    (new Alerta())->add_alerta('success', "La categoría <strong>{$postData['nombre']}</strong> se cargó correctamente");
    header('Location: ../index.php?sec=admin_categorias');
} catch (Exception $e) {
           echo "<pre>";
      print_r($e);
      echo "</pre>";
      die("No se pudo cargar la cateogria =(");
    (new Alerta())->add_alerta('danger', "Ocurrió un error inesperado, por favor póngase en contacto con el administrador del sistema.");
    header('Location: ../index.php?sec=admin_categorias');
}
