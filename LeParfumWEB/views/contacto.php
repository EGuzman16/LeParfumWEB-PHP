    <!-- Formulario de contacto -->
    <section class="contacto-section">
    <div class="container mt-5">
        <h1>Contáctanos</h1>
        <form method="POST" action="index.php?sec=procesar_formulario_contacto" target="#confirmacionModal">
            <div class="form-group">
                <label for="nombre">Nombre y Apellido:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu nombre y apellido" required>
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="tucorreo@ejemplo.com" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Tu número de teléfono" required>
            </div>
            <div class="form-group">
                <label for="asunto">Asunto:</label>
                <input type="text" class="form-control" id="asunto" name="asunto" placeholder="Asunto del mensaje" required>
            </div>
            <div class="form-group">
                <label for="mensaje">Mensaje:</label>
                <textarea class="form-control" id="mensaje" name="mensaje" rows="5" placeholder="Escribe tu mensaje aquí" required></textarea>
            </div>
            <button type="submit" class="btn btn-secondary" style="margin-bottom: 1em;">Enviar</button>
        </form>
    </div>
    </section>

    <?PHP 
include_once('includes/suscribir.php');
?>