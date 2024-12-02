<?PHP
require_once "../../functions/autoload.php";

$postData = $_POST;
$items = (new Carrito())->get_carrito();
$userID = $_SESSION['loggedIn']['id'] ?? FALSE;

// echo "<pre>";
// print_r($postData);
// echo "</pre>";

try {
    if ($userID && count($items)) {
        foreach ($items as $item) {
            (new Carrito())->insert_carrito(
                $item['nombre'],
                $item['precio'],
                $item['cantidad'],
                $postData['nombreComprador'],
                $postData['mail'],
                $postData['direccion'],
                $postData['numeroTarjeta'],
                $postData['nombreTarjeta'],
                $postData['codigo'],
                $postData['pago']
            );
        }

        (new Carrito())->clear_items();

        (new Alerta())->add_alerta('success', "Su compra <strong>{$postData['nombreComprador']}</strong> se cargó correctamente :) le enviaremos un correo a: {$postData['mail']} para coordinar la entrega de su paquete en la dirección {$postData['direccion']}");

        header('Location: ../../index.php?sec=gracias_por_su_compra');
    } else {
        (new Alerta())->add_alerta('warning', "Su sesión expiró o su carrito está vacío. Por favor, ingrese nuevamente o agregue productos al carrito.");
        header('Location: ../../index.php?sec=login');
    }
} catch (Exception $e) {
    echo "<pre>";
    print_r($e->getMessage());
    echo "</pre>";
    die("No se pudo cargar la compra :(");
}