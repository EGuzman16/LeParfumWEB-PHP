<div class="container mt-5">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Se almacenan en variables
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $marcasSeleccionadas = isset($_POST["marcas"]) ? $_POST["marcas"] : [];
        $mensaje = $_POST["mensaje"];

        // Mensaje de confirmación
        $confirmacionMensaje = "Su Suscripción ha sido enviado exitosamente.<br>";
        $confirmacionMensaje .= "Nombre: " .  $nombre . "<br>";
        $confirmacionMensaje .= "Correo Electrónico: " .  $email . "<br>";

        if (!empty($marcasSeleccionadas)) {
            $confirmacionMensaje .= "Marcas Seleccionadas: " . implode(", ", $marcasSeleccionadas) . "<br>";
        } else {
            $confirmacionMensaje .= "No seleccionó ninguna marca.<br>";
        }

        $confirmacionMensaje .= "Mensaje: " .  $mensaje . "<br>";

        // Mostrar en la página
        echo '<div class="alert alert-success">' . $confirmacionMensaje . '</div>';
        echo '<a href="index.php" class="btn btn-primary">Volver atrás</a>';
    }
    ?>
</div>
