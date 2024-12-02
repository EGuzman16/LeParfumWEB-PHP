<?PHP

class Categoria
{

    protected $id;
    protected $nombre;


    /**
     * Devuelve el listado completo de categorias en sistema
     */
    public function lista_completa(): array
    {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM categorias";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $lista = $PDOStatement->fetchAll();

        return $lista;
    }

    /**
     * Devuelve un array con los alias y IDS de todos las categorias principales existentes en nuestro catalogo
     */
    public function listar_generos(): array
    {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT DISTINCT
                    categorias.id,
                    categorias.nombre      
                    FROM perfumes 
                    JOIN categorias ON perfumes.categoria_principal_id = categorias.id;";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute();

        $lista = $PDOStatement->fetchAll();

        return $lista;
    }

    /**
     * Devuelve los datos de una categoriaen particular
     * @param int $id El ID único de la categoria
     */
    public function get_x_id(int $id): ?Categoria
    {

        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM categorias WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);

        $PDOStatement->execute([$id]);

        $result = $PDOStatement->fetch();

        return $result ?? null;
    }


/**
 * Inserta una nueva categoria en la base de datos
 * @param string $nombre
 */
public function insert(string $nombre)
{
    $conexion = Conexion::getConexion();
    $query = "INSERT INTO categorias (nombre) VALUES (:nombre)";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute([
        'nombre' => $nombre,
    ]);
}
/**
 * Edita los datos de una categoria en la base de datos
 * @param string $nombre
 */
public function edit($nombre)
{
    $conexion = Conexion::getConexion();
    $query = "UPDATE categorias SET nombre = :nombre WHERE id = :id";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute([
        'id' => $this->id,
        'nombre' => $nombre,
    ]);
}

/**
 * Elimina esta instancia de la base de datos
 */
public function delete()
{
    if (!$this->id) {
        // No hay ID, no se puede eliminar sin un ID
        return;
    }

    $conexion = Conexion::getConexion();
    $query = "DELETE FROM categorias WHERE id = :id";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->execute(['id' => $this->id]);
}


    public function getNombre()
    {
        return $this->nombre;
    }


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }
}
