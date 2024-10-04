<?php
/****ETL*****/
function cargar_datos_csv_a_db($ruta_csv) {
    global $wpdb;
    $nombre_tabla = $wpdb->prefix . 'news';
    
    // Verifica si el archivo CSV existe
    if (file_exists($ruta_csv)) {
        // Abre el archivo CSV
        if (($handle = fopen($ruta_csv, "r")) !== FALSE) {
            echo '<h3>Contenido del archivo CSV:</h3><pre>';
            
            // Eliminar BOM (Byte Order Mark) si existe
            $bom = fread($handle, 3);
            if ($bom !== "\xEF\xBB\xBF") {
                // Si no tiene BOM, retrocede el puntero al principio
                rewind($handle);
            }

            // Procesar cada línea del archivo CSV
            $primera_fila = true;
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                // Verifica si es la primera fila (encabezado) y omítela
                if ($primera_fila) {
                    $primera_fila = false;
                    continue;
                }

                // Imprime la fila para inspeccionar
                print_r($data);

                // Saneamiento y validación de datos
                $medio_nombre = sanitize_text_field($data[0]);
                $fecha_csv = sanitize_text_field($data[1]); // Fecha en formato dd-mm-yyyy
                $contenido = sanitize_textarea_field($data[2]);
                $url = esc_url_raw($data[3]);
                $titulo = sanitize_text_field($data[4]);
                $pais_medio = sanitize_text_field($data[5]);
                $producto = sanitize_text_field($data[6]);
                $pais_producto = sanitize_text_field($data[7]);
                $tag = sanitize_text_field($data[8]);
                $imagen = !empty($data[9]) ? sanitize_text_field($data[9]) : 'default_image_url.jpg'; // Imagen por defecto si no hay

                // Convertir la fecha de dd-mm-yyyy a yyyy-mm-dd
                $fecha_convertida = date_create_from_format('d-m-Y', $fecha_csv);
                if (!$fecha_convertida) {
                    echo "Error al convertir la fecha: " . $fecha_csv . "<br>";
                    continue; // Saltar esta fila si la fecha es inválida
                }
                $fecha_convertida = $fecha_convertida->format('Y-m-d');

                // Extraer el año de la fecha
                $anio = date('Y', strtotime($fecha_convertida));

                // Establecer el valor de draft como true por defecto
                $draft = true;

                // Verificar si ya existe un registro con el mismo título
                $existe_titulo = $wpdb->get_var($wpdb->prepare(
                    "SELECT COUNT(*) FROM $nombre_tabla WHERE titulo = %s", 
                    $titulo
                ));

                if ($existe_titulo == 0) {
                    // Inserta los datos en la base de datos solo si el título no existe
                    $result = $wpdb->insert(
                        $nombre_tabla,
                        array(
                            'medio_nombre' => $medio_nombre,
                            'titulo' => $titulo,
                            'fecha' => $fecha_convertida,
                            'anio' => $anio, // Año extraído de la fecha
                            'tag' => $tag,
                            'imagen' => $imagen,
                            'contenido' => $contenido,
                            'url' => $url,
                            'pais_medio' => $pais_medio,
                            'pais_producto' => $pais_producto,
                            'producto' => $producto,
                            'draft' => $draft, // Valor true por defecto
                        ),
                        array('%s', '%s', '%s', '%d', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%d')
                    );

                    // Verificar si la inserción fue exitosa
                    if ($result === false) {
                        echo 'Error al insertar en la base de datos: ' . $wpdb->last_error . "<br>";
                    } else {
                        echo 'Datos insertados correctamente para el título: ' . $titulo . "<br>";
                    }
                } else {
                    echo 'El título ya existe en la base de datos: ' . $titulo . "<br>";
                }
            }
            fclose($handle);
        } else {
            echo 'Error al abrir el archivo CSV.<br>';
        }
    } else {
        echo 'Archivo CSV no encontrado.<br>';
    }
}

// Ruta del archivo CSV (ajústala según tu ubicación)
$ruta_csv = __DIR__ . '/2022_news.csv';

// Verificación de la ruta generada
echo 'Ruta del CSV: ' . $ruta_csv . '<br>';

// Llama a la función para cargar el CSV
cargar_datos_csv_a_db($ruta_csv);

?>