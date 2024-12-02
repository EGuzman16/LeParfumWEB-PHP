<?PHP
require_once "../functions/autoload.php";

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

$secciones_validas = [
    "login" => [
        "titulo" => "Inicio de Sesión",
        "restringido" => FALSE
    ],
    "dashboard" => [
        "titulo" => "Panel de administración",
        "restringido" => TRUE
    ],
    "admin_perfumes" => [
        "titulo" => "Administrar perfumes",
        "restringido" => TRUE
    ],
    "admin_categorias" => [
        "titulo" => "Administrar Categorias",
        "restringido" => TRUE
    ],
    "admin_familias" => [
        "titulo" => "Administrar familias",
        "restringido" => TRUE
    ],
    "add_familia" => [
        "titulo" => "Agregar categoria",
        "restringido" => TRUE
    ],
    "edit_familia" => [
        "titulo" => "Editar datos de categoria",
        "restringido" => TRUE
    ],
    "delete_familia" => [
        "titulo" => "Eliminar datos de categoria",
        "restringido" => TRUE
    ],
    "admin_marcas" => [
        "titulo" => "Administrar marcas",
        "restringido" => TRUE
    ],
    "add_marca" => [
        "titulo" => "Agregar marca",
        "restringido" => TRUE
    ],
    "edit_marca" => [
        "titulo" => "Editar marca",
        "restringido" => TRUE
    ],
    "delete_marca" => [
        "titulo" => "Editar marca",
        "restringido" => TRUE
    ],
    "admin_disenadores" => [
        "titulo" => "Administrar disenadores",
        "restringido" => TRUE
    ],
    "add_disenador" => [
        "titulo" => "Administrar disenadores",
        "restringido" => TRUE
    ],
    "edit_disenador" => [
        "titulo" => "Administrar disenadores",
        "restringido" => TRUE
    ],
    "delete_disenador" => [
        "titulo" => "Administrar disenadores",
        "restringido" => TRUE
    ],
    "add_categoria" => [
        "titulo" => "Agregar categoria",
        "restringido" => TRUE
    ],
    "edit_categoria" => [
        "titulo" => "Editar datos de categoria",
        "restringido" => TRUE
    ],
    "delete_categoria" => [
        "titulo" => "Eliminar datos de categoria",
        "restringido" => TRUE
    ],
    "add_perfume" => [
        "titulo" => "Agregar Perfume",
        "restringido" => TRUE
    ],
    "edit_perfume" => [
        "titulo" => "Editar datos de perfume",
        "restringido" => TRUE
    ],
    "delete_perfume" => [
        "titulo" => "Eliminar datos de un perfume",
        "restringido" => TRUE
    ]
];


$seccion = $_GET['sec'] ?? "dashboard";

if (!array_key_exists($seccion, $secciones_validas)) {
    $vista = "404";
    $titulo = "404 - Página no encontrada";
} else {
    $vista = $seccion;

    if ($secciones_validas[$seccion]['restringido']) {
        (new Autenticacion())->verify();
    }

    $titulo = $secciones_validas[$seccion]['titulo'];
}

$userData = $_SESSION['loggedIn'] ?? FALSE;

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Perfumes :: <?= $titulo ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <meta name="description" content="Tienda de cosmética en línea con una amplia selección de perfumes.">
    <meta name="keywords" content="cosmética, perfumes,belleza, tienda en línea">
    <meta name="author" content="Elizabeth Guzman">
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <img src="../img/logo.png" alt="Logo de la Tienda" width="50">
            <a class="navbar-brand" href="../index.php?sec=home">Panel de Administración</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link active <?= $userData ? "" : "d-none" ?>" href="index.php?sec=dashboard">Panel de Administración</a>
                    </li>

                    <li class="nav-item <?= $userData ? "" : "d-none" ?>">
                        <a class="nav-link" href="index.php?sec=admin_perfumes">Administrar Productos</a>
                    </li>

                    <li class="nav-item <?= $userData ? "" : "d-none" ?>">
                        <a class="nav-link" href="index.php?sec=admin_categorias">Administrar Categorias</a>
                    </li>
                    <li class="nav-item <?= $userData ? "" : "d-none" ?>">
                        <a class="nav-link" href="index.php?sec=admin_familias">Administrar Familias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $userData ? "" : "d-none" ?>" href="index.php?sec=admin_marcas">Administrar Marcas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $userData ? "" : "d-none" ?>" href="index.php?sec=admin_disenadores">Administrar Diseñadores</a>
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

    <main class="container my-5">

        <?PHP


        require_once file_exists("views/$vista.php") ? "views/$vista.php" : "views/404.php";

        ?>
    </main>


    <footer>
        <div class="container text-center">
            <p>ELIZABETH GUZMAN | Diseño y Programación web</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('table').DataTable({
                "pageLength": 3,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-AR.json',
                },

            });
        });
    </script>


</body>

</html>