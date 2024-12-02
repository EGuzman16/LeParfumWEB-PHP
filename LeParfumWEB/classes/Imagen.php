<?php

class Imagen
{
    public function subirImagen($directorio, $datosArchivo): array
    {
        if (!file_exists($directorio) || !is_dir($directorio)) {
            throw new Exception("El directorio de destino no existe o no es válido");
        }

        $or_name = (explode(".", $datosArchivo['name']));
        $extension = end($or_name);
        $filename = time() . ".$extension";

        $fileUpload = move_uploaded_file($datosArchivo['tmp_name'], "$directorio/$filename");

        if (!$fileUpload) {
            throw new Exception("No se pudo subir la imagen");
        } else {
            echo "Imagen subida con éxito: $filename";
            return ['nombre' => $filename, 'extension' => $extension];
        }
    }

    public function borrarImagen($archivo): bool
    {
        if (file_exists($archivo)) {
            echo "<pre>";
            print_r($archivo);
            echo "</pre>";

            $fileDelete = unlink($archivo);

            if (!$fileDelete) {
                throw new Exception("No se pudo eliminar la imagen");
            } else {
                return true;
            }
        } else {
            return false;
        }
    }
}

