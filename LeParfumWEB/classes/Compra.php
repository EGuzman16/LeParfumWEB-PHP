<?php
class Compra
{
    /**
     * Obtiene las compras de un usuario por su ID.
     * @param int $userID El ID del usuario.
     * @return array Un array con las compras del usuario.
     */
    public function compras_x_id_usuario(int $userID): array
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT carrito.carrito_id AS id, GROUP_CONCAT(CONCAT(carrito.cantidad, 'x ' ,carrito.nombre, ' - $', carrito.precio) SEPARATOR ', ') AS detalle 
                  FROM carrito 
                  WHERE carrito.nombreComprador = (SELECT nombre FROM usuarios WHERE id = ?) 
                  GROUP BY carrito.carrito_id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute([$userID]);

        $result = $PDOStatement->fetchAll();

        return $result ?? [];
    }
}