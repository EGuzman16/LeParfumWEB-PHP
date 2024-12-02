<?PHP

class Disenador
{

    private $id;
    private $nombre_completo;
    private $biografia;
    private $foto_perfil;


        /**
     * Devuelve todos los diseñadores en base
     * @return Disenador[]
     */
    public function lista_completa(): array
    {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM disenadores";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $result = $PDOStatement->fetchAll();             
        return $result;
    }

        /**
 * Devuelve un array con los IDs y nombres de todos los diseñadores existentes en nuestro catálogo
 */
public function listar_disenadores(): array
{
    $conexion = (new Conexion())->getConexion();
    $query = "SELECT DISTINCT
                disenadores.id,
                disenadores.nombre_completo     
                FROM perfumes 
                JOIN disenadores ON perfumes.disenador_id = disenadores.id;";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
    $PDOStatement->execute();

    $lista = $PDOStatement->fetchAll();

    return $lista;
}

    /**
     * Devuelve los datos de un diseñador en particular
     * @param int $id El ID único del diseñador
     */
    public function get_x_id(int $id): ?Disenador
    {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM disenadores WHERE id = $id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $result = $PDOStatement->fetch();    
        return $result ?? null;
    }

/**
 * Inserta un nuevo diseñador en la base de datos
 * @param string $nombre
 * @param string $biografia 
 * @param string $imagen ruta a un archivo .jpg o .png 
 */
public function insert(string $nombre, string $biografia, string $imagen)
{
    $conexion = Conexion::getConexion();
    $query = "INSERT INTO disenadores (`nombre_completo`, `biografia`, `foto_perfil`) VALUES (:nombre, :biografia, :foto_perfil)";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute(
        [
            'nombre' => $nombre,
            'biografia' => $biografia,
            'foto_perfil' => $imagen
        ]
    );
}


/**
 * Edita un diseñador en la base de datos
 * @param string $nombre
 * @param string $biografia 
 * @param string $imagen ruta a un archivo .jpg o .png 
 */
public function edit($nombre, $biografia, $imagen)
{
    $conexion = Conexion::getConexion();
    $query = "UPDATE disenadores SET nombre_completo = :nombre_completo, biografia = :biografia, foto_perfil = :foto_perfil WHERE id = :id";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute(
        [
            'id' => $this->id,
            'nombre_completo' => $nombre,           
            'biografia' => $biografia,
            'foto_perfil' => $imagen
        ]
    );
}


        /**
     * Elimina esta instancia de la base de datos
     */
    public function delete()
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM disenadores WHERE id = ?";

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
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of foto_perfil
     */ 
    public function getFoto_perfil()
    {
        return $this->foto_perfil;
    }
}