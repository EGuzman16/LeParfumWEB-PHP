<?PHP
class Carrito
{
    protected $carrito_id;
    protected $nombre;
    protected $precio;
    protected $cantidad;
    protected $nombreComprador;
    protected $mail;
    protected $direccion;
    protected $numeroTarjeta;
    protected $nombreTarjeta;
    protected $codigo;
    protected $pago;

    /**
     * Agrega un item al carrito 
     * @param int $productoID El ID del producto que se carga.
     * @param int $cantidad La cantidad de unidades del producto.
     */
    public function add_item(int $productoID, int $cantidad)
    {
        $itemData = (new Perfume)->producto_x_id($productoID);

        if ($itemData) {
            $_SESSION['carrito'][$productoID] = [
                'nombre' => $itemData->getNombre(),
                'imagen' => $itemData->getImagen(),
                'precio' => $itemData->getPrecio(),
                'cantidad' => $cantidad
            ];
        }
    }

    /**
     * Elimina un item 
     * @param int $productoID El id del producto a eliminar
     */
    public function remove_item(int $productoID)
    {
        if (isset($_SESSION['carrito'][$productoID])) {
            unset($_SESSION['carrito'][$productoID]);
        }
    }

    /**
     * Vacia el carrito de compras
     */
    public function clear_items()
    {
        $_SESSION['carrito'] = [];
    }

    /**
     * Actualiza las cantidades 
     * @param array $cantidades Array asociativo.
     */
    public function update_quantities(array $cantidades)
    {
        foreach ($cantidades as $key => $value) {
            if (isset($_SESSION['carrito'][$key])) {
                $_SESSION['carrito'][$key]['cantidad'] = $value;
            }
        }
    }

    /**
     * Devuelve el contenido del carrito.
     */
    public function get_carrito(): array
    {
        if (!empty($_SESSION['carrito'])) {
            return $_SESSION['carrito'];
        } else {
            return [];
        }
    }

    /**
     * Devuelve el precio total actual.
     */
    public function precio_total(): float
    {
        $total = 0;
        if (!empty($_SESSION['carrito'])) {
            foreach ($_SESSION['carrito'] as $item) {
                $total += $item['precio'] * $item['cantidad'];
            }
        }
        return $total;
    }

    /**
     * Inserta los datos del carrito en la base de datos.
     * @param string $nombreComprador
     * @param string $mail
     * @param string $direccion
     * @param string $numeroTarjeta
     * @param string $nombreTarjeta
     * @param string $codigo
     * @param string $pago
     */
    public function insert_carrito($nombreComprador, $mail, $direccion, $numeroTarjeta, $nombreTarjeta, $codigo, $pago)
    {
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO carrito(`nombre`, `precio`, `cantidad`, `nombreComprador`, `mail`, `direccion`, `numeroTarjeta`, `nombreTarjeta`, `codigo`, `pago`) 
                  VALUES (:nombre, :precio, :cantidad, :nombreComprador, :mail, :direccion, :numeroTarjeta, :nombreTarjeta, :codigo, :pago)";

        foreach ($this->get_carrito() as $productoID => $item) {
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute([
                'nombre' => $item['nombre'],
                'precio' => $item['precio'],
                'cantidad' => $item['cantidad'],
                'nombreComprador' => $nombreComprador,
                'mail' => $mail,
                'direccion' => $direccion,
                'numeroTarjeta' => $numeroTarjeta,
                'nombreTarjeta' => $nombreTarjeta,
                'codigo' => $codigo,
                'pago' => $pago
            ]);
        }
    }

    // Getters for the protected properties
    public function getCarrito_id()
    {
        return $this->carrito_id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function getNombreComprador()
    {
        return $this->nombreComprador;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function getNumeroTarjeta()
    {
        return $this->numeroTarjeta;
    }

    public function getNombreTarjeta()
    {
        return $this->nombreTarjeta;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getPago()
    {
        return $this->pago;
    }
}