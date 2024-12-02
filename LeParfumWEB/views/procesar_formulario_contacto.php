    <div class="container mt-5">
        <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    
    // Se almacenan en variables
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $asunto = $_POST["asunto"];
    $mensaje = $_POST["mensaje"];
    
    // Mensaje de confirmación
    $confirmacionMensaje = "Su mensaje ha sido enviado exitosamente. Nos pondremos en contacto a la brevedad posible. <br>";
    $confirmacionMensaje .= "Nombre: " .  $nombre . "<br>";
    $confirmacionMensaje .= "Correo Electrónico: " .  $email . "<br>";
    $confirmacionMensaje .= "Teléfono: " .  $telefono . "<br>";
    $confirmacionMensaje .= "Asunto: " .  $asunto . "<br>";
    $confirmacionMensaje .= "Mensaje: " .  $mensaje . "<br>";
    //Mostrar en la página
    echo '<div class="alert alert-success">' . $confirmacionMensaje . '</div>';
    echo '<a href="index.php?sec=contacto" class="btn btn-primary">Volver atrás</a>';
}
        ?>
    </div>

