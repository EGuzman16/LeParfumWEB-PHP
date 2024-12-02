<?PHP

class Perfume
{

    private $id;
    private $categoria_principal;
    private $familia;
    private $nombre;
    private $fecha;
    private $disenador;
    private $marca;
    private $descripcion;
    private $categorias_secundarias;
    private $pais;
    private $proveedor;
    private $imagen;
    private $precio;

    private static $createValues = ['id', 'nombre', 'fecha', 'pais', 'proveedor', 'descripcion', 'imagen', 'precio'];


    /**
     * Devuelve una instancia del objeto Perfume, con todas sus propiedades configuradas
     *@return Perfume
     */
    private function createPerfume($perfumeData): Perfume
    {
        // echo "<pre>";
        // print_r($perfumeData);
        // echo "</pre>";

        $perfume = new self();


        foreach (self::$createValues as $value) {
            $perfume->{$value} = $perfumeData[$value];
        }


        $perfume->disenador = (new Disenador())->get_x_id($perfumeData['disenador_id']);
        $perfume->marca = (new Marca())->get_x_id($perfumeData['marca_id']);
        $perfume->categoria_principal = (new Categoria())->get_x_id($perfumeData['categoria_principal_id']);
        $perfume->familia = (new Familia())->get_x_id($perfumeData['familia_id']);

        $PSIds = !empty($perfumeData['categorias_secundarias']) ? explode(",", $perfumeData['categorias_secundarias']) : [];

        $categorias_secundarias = [];
        foreach ($PSIds as $PSId) {
            $categorias_secundarias[] = (new Categoria())->get_x_id(intval($PSId));
        }

        $perfume->categorias_secundarias = $categorias_secundarias;

        return $perfume;
    }
    /**
     * Devuelve el catálgo completo
     * @return Perfume[] Un Array lleno de instancias de objeto Perfume.
     */
    public function catalogo_completo(): array
    {

        $catalogo = [];

        $conexion = Conexion::getConexion();
        $query = "SELECT perfumes.*, GROUP_CONCAT(pxc.categoria_id) AS categorias_secundarias FROM perfumes 
        LEFT JOIN categorias_x_perfume AS pxc ON perfumes.id = pxc.perfume_id     
        GROUP BY perfumes.id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute();

        // $catalogo = $PDOStatement->fetchAll();

        //  echo "<pre>";
        //  print_r($catalogo);
        //  echo "</pre>";

        while ($result = $PDOStatement->fetch()) {
            $catalogo[] = $this->createPerfume($result);
        }

        return $catalogo;
    }

    /**
     * Devuelve el catalogo de productos de una categoria en particular
     * @param int $categoria_principal_id El ID de la categoria principal a buscar.
     * @return Perfume[] Un Array lleno de instancias de objeto Perfume.
     */
    public function catalogo_x_categoria(int $categoria_principal_id): array
    {

        $catalogo = [];

        $conexion = Conexion::getConexion();
        $query = "SELECT perfumes.*, GROUP_CONCAT(pcx.categoria_id) AS categorias_secundarias
        FROM perfumes 
        LEFT JOIN categorias_x_perfume AS pcx ON perfumes.id = pcx.perfume_id
        WHERE categoria_principal_id = ?
        GROUP BY perfumes.id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute([$categoria_principal_id]);

        while ($result = $PDOStatement->fetch()) {
            $catalogo[] = $this->createPerfume($result);
        }
        return $catalogo;
    }


    /**
     * Devuelve los perffumes por un determinada marca
     * @param int $idMarca El ID único de la marca buscada 
     * 
     * @return Perfume[] Un array de objetos Perfume
     */
    public function catalogo_x_marca(int $marca_id): array
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM perfumes WHERE marca_id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute([$marca_id]);

        $catalogo = [];
        while ($result = $PDOStatement->fetch()) {
            $catalogo[] = $this->createPerfume($result);
        }

        return $catalogo ?? null;
    }

        /**
     * Devuelve los perfumes por un determinado diseñador
     * @param int $idDisenador El ID único del diseñador buscado 
     * 
     * @return Perfume[] Un array de objetos Perfume
     */
    public function catalogo_x_disenador(int $disenador_id): array
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM perfumes WHERE disenador_id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute([$disenador_id]);

        $catalogo = [];
        while ($result = $PDOStatement->fetch()) {
            $catalogo[] = $this->createPerfume($result);
        }

        return $catalogo ?? null;
    }

    /**
     * Devuelve los datos de un producto en particular
     * @param int $idProducto El ID único del producto a mostrar 
     */
    public function producto_x_id(int $idProducto): ?Perfume
{
    $conexion = Conexion::getConexion();
    $query = "SELECT perfumes.*, GROUP_CONCAT(pxc.categoria_id) AS categorias_secundarias FROM perfumes 
    LEFT JOIN categorias_x_perfume AS pxc ON perfumes.id = pxc.perfume_id
    WHERE perfumes.id = ?
    GROUP BY perfumes.id";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
    $PDOStatement->execute([$idProducto]);

    $result = $this->createPerfume($PDOStatement->fetch());

    return $result ?? null;
}

/**
     * Devuelve los datos de un producto buscado
     * @param string de los productos relacionados con el termino de bùsqueda 
     */

    public function buscador(string $terminoBusqueda): array
{
    $conexion = Conexion::getConexion();
    $query = "SELECT * FROM perfumes WHERE nombre LIKE :termino OR descripcion LIKE :termino";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
    $PDOStatement->execute(['termino' => "%$terminoBusqueda%"]);

    // Devuelve directamente los resultados
    return $PDOStatement->fetchAll();
}



/**
 * Inserta un nuevo perfume a la base de datos
 * @param string $nombre
 * @param int $categoria_principal_id
 * @param int $familia_id
 * @param int $disenador_id
 * @param int $marca_id
 * @param string $fecha El día de publicación en formato YYYY-DD-MM
 * @param string $descripcion
 * @param string $pais 
 * @param string $proveedor 
 * @param string $imagen ruta a un archivo .jpg o .png 
 * @param float $precio   
 */
public function insert($nombre, $categoria_principal_id, $familia_id, $disenador_id, $marca_id, $fecha, $pais, $proveedor, $descripcion, $imagen, $precio): int
{
    $conexion = Conexion::getConexion();
    $query = "INSERT INTO perfumes (`nombre`, `categoria_principal_id`, `familia_id`, `disenador_id`, `marca_id`, `fecha`, `pais`, `proveedor`, `descripcion`, `imagen`, `precio`) 
            VALUES (:nombre, :categoria_principal_id, :familia_id, :disenador_id, :marca_id, :fecha, :pais, :proveedor, :descripcion, :imagen, :precio)";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute([
        'nombre' => $nombre,
        'categoria_principal_id' => $categoria_principal_id,
        'familia_id' => $familia_id,
        'disenador_id' => $disenador_id,
        'marca_id' => $marca_id,
        'fecha' => $fecha,
        'pais' => $pais,
        'proveedor' => $proveedor,
        'descripcion' => $descripcion,
        'imagen' => $imagen,
        'precio' => $precio
    ]);

    return $conexion->lastInsertId();
}

/**
 * Edita un perfume en la base de datos
 * @param int $id El ID del perfume a editar
 * @param string $nombre
 * @param int $categoria_principal_id
 * @param int $familia_id
 * @param int $disenador_id
 * @param int $marca_id
 * @param string $fecha El día de publicación en formato YYYY-DD-MM
 * @param string $descripcion
 * @param string $pais 
 * @param string $proveedor 
 * @param string $imagen ruta a un archivo .jpg o .png 
 * @param float $precio   
 */
public function edit($id, $nombre, $categoria_principal_id, $familia_id, $disenador_id, $marca_id, $fecha, $pais, $proveedor, $descripcion, $imagen, $precio)
{
    $conexion = Conexion::getConexion();
    $query = "UPDATE perfumes 
        SET `nombre` = :nombre, 
            `categoria_principal_id` = :categoria_principal_id, 
            `familia_id` = :familia_id, 
            `disenador_id` = :disenador_id, 
            `marca_id` = :marca_id, 
            `fecha` = :fecha, 
            `pais` = :pais, 
            `proveedor` = :proveedor, 
            `descripcion` = :descripcion, 
            `imagen` = :imagen, 
            `precio` = :precio 
        WHERE `id` = :id";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute([
        'id' => $id,
        'nombre' => $nombre,
        'categoria_principal_id' => $categoria_principal_id,
        'familia_id' => $familia_id,
        'disenador_id' => $disenador_id,
        'marca_id' => $marca_id,
        'fecha' => $fecha,
        'pais' => $pais,
        'proveedor' => $proveedor,
        'descripcion' => $descripcion,
        'imagen' => $imagen,
        'precio' => $precio
    ]);
}

/**
 * Elimina esta instancia de perfume de la base de datos
 */
public function delete()
{
    $conexion = Conexion::getConexion();
    $query = "DELETE FROM perfumes WHERE id = :id";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute(['id' => $this->id]);
}


    /**
     * Crea un vinculo entre un perfume y un categoria secundaria
     * @param int $perfume_id
     * @param int $categoria_id
     */
    public function add_categorias_sec(int $perfume_id, int $categoria_id)
    {
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO categorias_x_perfume VALUES (NULL, :perfume_id, :categoria_id)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'perfume_id' => $perfume_id,
                'categoria_id' => $categoria_id
            ]
        );
    }

    /**
     * Vaciar lista de categorias secundarias
     * @param int $perfume_id
     */
    public function clear_categorias_sec()
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM categorias_x_perfume WHERE perfume_id = :perfume_id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'perfume_id' => $this->id
            ]
        );
    }


    /**
     * Devuelve el nombre completo
     */
    public function nombre_completo(): string
    {
        return $this->getMarca()->getNombre();
    }

    /**
     * Devuelve el precio de la unidad, formateado correctamente
     */
    public function precio_formateado(): string
    {
        return number_format($this->precio, 2, ",", ".");
    }

    /**
     * Esta función devuelve las primeras x palabras de un párrafo 
     * @param int $cantidad Esta es la cantidad de palabras a extraer (Opcional)
     */
    public function descripcion_reducida(int $cantidad = 10): string
    {
        $texto = $this->descripcion;

        $array = explode(" ", $texto);
        if (count($array) <= $cantidad) {
            $resultado = $texto;
        } else {
            array_splice($array, $cantidad);
            $resultado = implode(" ", $array) . "...";
        }

        return $resultado;
    }



    /**
     * Get the value of categoria
     */
    public function getCategoria()
    {
        return $this->categoria_principal->getNombre();

    }

    /**
     * Get the value of familia
     */
    public function getFamilia()
    {
        return $this->familia->getNombre();
    }



    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Get the value of fecha
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Get the value of diseñador
     */
    public function getDisenador()
    {
        return $this->disenador->getNombre_completo();
    }

    /**
     * Get the value of marca
     */
    public function getMarca()
    {
        return $this->marca->getNombre_completo();
        
    }

    /**
     * Get the value of descripcion
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Get the value of imagen
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Get the value of precio
     */
    public function getPrecio()
    {
        return $this->precio;
    }



    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Get the value of pais
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * Get the value of proveedor
     */
    public function getProveedor()
    {
        return $this->proveedor;
    }

    /**
     * Get the value of categoria_principal
     */
    public function getCategoria_principal()
    {
        return $this->categoria_principal;
    }

    /**
     * Get the value of categorias_secundarios
     */
    public function getCategorias_secundarias()
    {
        return $this->categorias_secundarias;
    }

    /**
     * Devuelve un array compuesto por IDs de todos los categorias secundarias
     */
    public function getCategorias_secundarias_ids(): array
    {
        $result = [];
        foreach ($this->categorias_secundarias as $value) {
            $result[] = intval($value->getId());
        }
        return $result;
    }
}
