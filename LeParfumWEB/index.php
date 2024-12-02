<?PHP
require_once "functions/autoload.php";



$generos = (new Categoria())->listar_generos();

$secciones_validas = [
    "home" => [
        "titulo" => "Bienvenidos",
        "restringido" => FALSE
    ],
    "datos_alumno" => [
        "titulo" => "Datos Alumno",
        "restringido" => FALSE
    ],
    "nosotros" => [
        "titulo" => "Sobre Nosotros",
        "restringido" => FALSE
    ],
    "perfumes" => [
        "titulo" => "Nuestro catalogo",
        "restringido" => FALSE
    ],
    "producto" => [
        "titulo" => "Detalle de Producto",
        "restringido" => FALSE
    ],
    "contacto" => [
        "titulo" => "Contacto",
        "restringido" => FALSE
    ], 
    "buscador" => [
        "titulo" => "Resultados busqueda",
        "restringido" => FALSE
    ], 
    "carrito" => [
        "titulo" => "Carrito de compras",
        "restringido" => FALSE
    ],
    "login" => [
        "titulo" => "Inicio de Sesión",
        "restringido" => FALSE
    ],
    "panel_usuario" => [
        "titulo" => "Panel de Usuario",
        "restringido" => FALSE
    ],
    "finalizar_pago" => [
        "titulo" => "Finalizar Pago",
        "restringido" => FALSE
    ]

];

$seccion = isset($_GET['sec']) ? $_GET['sec'] : 'home';

if (!array_key_exists($seccion, $secciones_validas)) {
    $vista = "404";
    $titulo = "404: Página no encontrada";
} else {
    $vista = $seccion;

    
    if($secciones_validas[$seccion]['restringido']){
        (new Autenticacion())->verify(FALSE);        
    }

    
    $titulo = $secciones_validas[$seccion]['titulo'];

    $userData = $_SESSION['loggedIn'] ?? FALSE;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tienda de Perfumes</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <meta name="description" content="Tienda de cosmética en línea con una amplia selección de perfumes.">
        <meta name="keywords" content="cosmética, perfumes,belleza, tienda en línea">
        <meta name="author" content="Elizabeth Guzman">
        <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    </head>

<body>
<!-- Índice de navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
        <img src="img/logo.png" alt="Logo de la Tienda" width="50">
            <a class="navbar-brand" href="index.php?sec=home">LE PARFUM Web!</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?sec=home">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?sec=nosotros">Sobre Nosotros</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?sec=catalogo_completo">Catalogo</a>
                    </li>

                    <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="categoriasDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Perfumes
                </a>
                <ul class="dropdown-menu" aria-labelledby="categoriasDropdown">

                <?PHP foreach ($generos as $pagina) { ?>

<li class="dropdown-item">
    <a class="nav-link" href="index.php?sec=perfumes&per=<?= $pagina['id'] ?>"><?= $pagina['nombre'] ?></a>
</li>
<?PHP } ?>
                </ul>
            </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?sec=datos_alumno">Datos del Alumno</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="index.php?sec=contacto">Contacto</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link bg-secondary text-light text-center rounded me-2" href="admin"><i class="fa-solid fa-gear"></i>Admin</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link bg-danger text-light text-center rounded me-2" href="index.php?sec=carrito"><i class="fa fa-shopping-cart"></i> Carrito</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link bg-info text-light text-center rounded me-2" href="index.php?sec=panel_usuario"><i class="fa-solid fa-user"></i> Usuario</a> 
                                    
                    </li>

                    <li class="nav-item <?= $userData ? "d-none" : "" ?>">
                        <a class="nav-link fw-bold" href="index.php?sec=login">Login</a>
                    </li>

                    <li class="nav-item <?= $userData ? "" : "d-none" ?>">
                        <a class="nav-link fw-bold" href="actions/auth_logout.php">Logout: <span class="fw-light"><?= $userData['username'] ?? "" ?></span></a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <main>
    <?PHP
if(file_exists("views/$seccion.php")){
    require_once "views/$seccion.php";
}else{
    require_once "views/404.php";
}
?>
    </main>

<!-- Footer -->
<footer>
    <div class="container text-center">
        <p>ELIZABETH GUZMAN | Diseño y Programación web</p>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>