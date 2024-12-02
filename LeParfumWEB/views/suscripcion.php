<section class="suscripcion-section">
    <<div class="container mt-5">
        <h1 class="modal-title" id="exampleModalLabel">Suscripción</h1>
        <p>Completa el siguiente formulario para hacerte llegar nuestro Newsletter</p>
        <form method="POST" action="index.php?sec=procesar_suscripcion" target="#confirmacionModal">
            <div class="form-group">
                <label for="nombre">Nombre y Apellido:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu nombre y apellido" required>
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="tucorreo@ejemplo.com" required>
            </div>
            <div class="form-group">
                <label>Selecciona las marcas de perfume que más te interesan</label>
                <?php
                // 1° Definimos Array
                $marcas = array("CAROLINA HERRERA", "GIORGIO ARMANI", "TOUS", "YVES SAINT LAURENT", "HUGO BOSS");

                //2° recorro el el array y hay que reemplazar por el nombre (clase4: https://drive.google.com/file/d/1KqSS998UU2I5xF49srOHvr9aUQu9FW3q/view)
                foreach ($marcas as $marca) {
                    $marcaId = str_replace(" ", "", $marca); // Elimina espacios para usar como ID
                    echo '<div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="' . $marcaId . '" name="marcas[]" value="' . $marca . '">
                                    <label class="form-check-label" for="' . $marcaId . '">' . $marca . '</label>
                        </div>';
                }
                ?>

            </div>
            <div class="form-group">
                <label for="mensaje">Cuéntanos qué marcas quisieras ver en nuestra web</label>
                <textarea class="form-control" id="mensaje" name="mensaje" rows="5" placeholder="Escribe tu mensaje aquí" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary" style="margin-bottom: 1em;">Enviar</button>
        </form>
        </div>
</section>