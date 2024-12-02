<?PHP

class Familia
{
    protected $id;
    protected $nombre;




        /**
     * Devuelve los datos de una familia olfativa en particular
     * @param int $id El ID único de la familia
     * @return familia[]
     */
    public function lista_completa(): array
    {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM familias";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $result = $PDOStatement->fetchAll();


        return $result;
    }
    
    /**
     * Devuelve los datos de una familia olfativa en particular
     * @param int $id El ID único de la familia
     */
    public function get_x_id(int $id): ?Familia
    {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM familias WHERE id = $id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $result = $PDOStatement->fetch();       
        return $result ?? null;
    }

 /**
     * Inserta una nueva familia en la base de datos
     * @param string $nombre
     */
    public function insert(string $nombre)
    {
        $conexion = Conexion::getConexion();
        $query = "INSERT INTO familias (nombre) VALUES (:nombre)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(['nombre' => $nombre]);
    }

    /**
     * Edita los datos de una familia en la base de datos
     * @param string $nombre
     */
    public function edit(string $nombre)
    {
        $conexion = Conexion::getConexion();
        $query = "UPDATE familias SET nombre = :nombre WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(['id' => $this->id, 'nombre' => $nombre]);
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
        $query = "DELETE FROM familias WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute(['id' => $this->id]);
    }

    /**
     * Get the value of nombre
     */ 
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
