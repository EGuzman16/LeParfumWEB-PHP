<?PHP

class Marca
{

    protected $id;
    protected $nombre_completo;
    protected $biografia;
    protected $imagen;


        /**
     * Devuelve todos las marcas en base
     * @return Marca[]
     */
    public function lista_completa(): array
    {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM marcas";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $result = $PDOStatement->fetchAll();

        return $result;
    }

    /**
 * Devuelve un array con los IDs y nombres de todas las marcas existentes en nuestro catálogo
 */
public function listar_marcas(): array
{
    $conexion = (new Conexion())->getConexion();
    $query = "SELECT DISTINCT
                marcas.id,
                marcas.nombre_completo     
                FROM perfumes 
                JOIN marcas ON perfumes.marca_id = marcas.id;";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
    $PDOStatement->execute();

    $lista = $PDOStatement->fetchAll();

    return $lista;
}
    
    /**
     * Devuelve los datos de una marca en particular
     * @param int $id El ID único de la Marca
     */
    public function get_x_id(int $id): ?Marca
    {

        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM marcas WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);

        $PDOStatement->execute([$id]);

        $result = $PDOStatement->fetch();

        return $result ?? null;
    }

/**
 * Inserta una nueva marca en la base de datos
 * @param string $nombre
 * @param string $biografia 
 * @param string $imagen ruta a un archivo .jpg o .png 
 */
public function insert(string $nombre, string $biografia,  string $imagen)
{
    $conexion = Conexion::getConexion();
    $query = "INSERT INTO marcas (`nombre_completo`, `biografia`, `imagen`) VALUES (:nombre, :biografia, :imagen)";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute(
        [
            'nombre' => $nombre,           
            'biografia' => $biografia, 
            'imagen' => $imagen
        ]
    );
}

    /**
     * Edita una marca en la base de datos
     * @param string $nombre
     * @param string $biografia 
     * @param string $imagen ruta a un archivo .jpg o .png 
     */
    public function edit($nombre, $biografia, $imagen)
    {

        $conexion = Conexion::getConexion();
        $query = "UPDATE marcas SET nombre_completo = :nombre_completo, biografia = :biografia, imagen = :imagen WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(
            [
                'id' => $this->id,
                'nombre_completo' => $nombre,           
                'biografia' => $biografia,
                'imagen' => $imagen
            ]
        );
    }

        /**
     * Elimina esta instancia de la base de datos
     */
    public function delete()
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM marcas WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([$this->id]);
    }
    
    /**
     * Get the value of nombre_completo
     */ 
    public function getNombre_completo()
    {
        return $this->nombre_completo;
    }

    /**
     * Get the value of biografia
     */ 
    public function getBiografia()
    {
        return $this->biografia;
    }

    /**
     * Get the value of foto_perfil
     */ 
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }
}