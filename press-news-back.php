<?php

/////////////////// NUEVA TABLA EN BASE DE DATOS/////////////////////////////////
// Función para crear una nueva tabla en la base de datos de WordPress
function crear_tabla_personalizada() {
    global $wpdb;

    $nombre_tabla = $wpdb->prefix . 'news';

    // Verificar si la tabla ya existe
    if ($wpdb->get_var("SHOW TABLES LIKE '$nombre_tabla'") != $nombre_tabla) {

        $charset_collate = $wpdb->get_charset_collate();

        // Consulta SQL para crear la tabla con el campo draft
        $sql = "CREATE TABLE $nombre_tabla (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            medio_nombre varchar(255) NOT NULL,
            titulo varchar(255) NOT NULL,
            fecha date NOT NULL,
            anio year NOT NULL,
            tag varchar(255) NOT NULL,
            imagen varchar(255) NOT NULL,
            contenido text NOT NULL,
            url varchar(255) NOT NULL,
            pais_medio varchar(255) NOT NULL,
            pais_producto varchar(255) NOT NULL,
            producto varchar(255) NOT NULL,
            draft boolean NOT NULL DEFAULT 0,  -- Campo draft añadido aquí
            PRIMARY KEY  (id)
        ) $charset_collate;";

        // Incluimos el archivo que contiene la función dbDelta()
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

        // Ejecutamos la consulta SQL utilizando la función dbDelta()
        dbDelta($sql);
    }
}

// Añadir el gancho de activación para llamar a la función cuando sea necesario
add_action('admin_init', 'crear_tabla_personalizada');

function agregar_pagina_admin_personalizada() {
    add_menu_page(
        'Cargar Datos',
        'Cargar Datos',
        'manage_options',
        'cargar-datos',
        'formulario_cargar_datos'
    );
}
add_action('admin_menu', 'agregar_pagina_admin_personalizada');

function agregar_submenu_visualizar_datos() {
    add_submenu_page(
        'cargar-datos', // slug del menú principal
        'Visualizar Datos', // título de la página
        'Visualizar Datos', // título del menú
        'manage_options', // capacidad requerida para acceder
        'visualizar-datos', // slug de la página
        'visualizar_datos' // función de callback para mostrar la página
    );
}
add_action('admin_menu', 'agregar_submenu_visualizar_datos');

function visualizar_datos() {
    global $wpdb;

    // Obtener todos los elementos de la tabla personalizada
    $elementos = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}news");

    ?>
    <div class="wrap">
        <h2>Visualizar Datos</h2>
        <table class="wp-list-table widefat striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Medio Nombre</th>
                    <th>Título</th>
                    <th>Acciones</th> <!-- Nueva columna para los enlaces de edición y eliminación -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($elementos as $elemento) : ?>
                    <tr>
                        <td><?php echo $elemento->id; ?></td>
                        <td><?php echo $elemento->medio_nombre; ?></td>
                        <td><?php echo $elemento->titulo; ?></td>
                        <td>
                            <a href="?page=editar-datos&id=<?php echo $elemento->id; ?>">Editar</a> | <!-- Enlace de edición -->
                            <a href="#" class="eliminar-elemento" data-id="<?php echo $elemento->id; ?>">Eliminar</a> <!-- Enlace de eliminación -->
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script>
    jQuery(document).ready(function($) {
        $('.eliminar-elemento').click(function(e) {
            e.preventDefault();
            var idElemento = $(this).data('id');
            if (confirm('¿Estás seguro de que deseas eliminar este elemento?')) {
                $.ajax({
                    url: ajaxurl,
                    type: 'POST',
                    data: {
                        action: 'eliminar_elemento',
                        id: idElemento
                    },
                    success: function(response) {
                        // Recargar la página para reflejar los cambios
                        location.reload();
                    }
                });
            }
        });
    });
    </script>
    <?php
}

// Función para eliminar el elemento
add_action('wp_ajax_eliminar_elemento', 'eliminar_elemento');
function eliminar_elemento() {
    if (isset($_POST['id'])) {
        global $wpdb;
        $idElemento = intval($_POST['id']);
        // Realizar la eliminación del elemento en la base de datos
        $wpdb->delete($wpdb->prefix . 'news', array('id' => $idElemento));
    }
    wp_die();
}

function agregar_pagina_editar_datos() {
    add_submenu_page(
        'cargar-datos', // slug del menú principal
        'Editar Datos', // título de la página
        'Editar Datos', // título del menú
        'manage_options', // capacidad requerida para acceder
        'editar-datos', // slug de la página
        'editar_datos' // función de callback para mostrar la página
    );
}
add_action('admin_menu', 'agregar_pagina_editar_datos');

function cargar_mi_pagina_php() {
    ob_start();
    include_once('news-home.php');  // Asegúrate de cambiar la ruta al archivo correcto
    return ob_get_clean();
}
add_shortcode('mi_pagina_php', 'cargar_mi_pagina_php');

function editar_datos() {
    global $wpdb;

    // Verificar si se ha pasado un ID de elemento válido
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id_elemento = intval($_GET['id']);

        // Obtener detalles del elemento seleccionado
        $elemento = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$wpdb->prefix}news WHERE id = %d", $id_elemento));

        // Verificar si el elemento existe
        if ($elemento) {
            // Mostrar formulario de edición
            ?>
			<style>
        .form-wrap {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            width: 40%;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
        }

        input[type="text"],
        input[type="date"],
        input[type="url"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
            <div class="wrap">
                <h2>Editar Datos</h2>
                <div class="form-wrap">
                    <form method="post" action="">
                        <input type="hidden" name="id_elemento" value="<?php echo $elemento->id; ?>">
                        <input type="text" name="medio_nombre" placeholder="Medio Nombre" value="<?php echo esc_attr($elemento->medio_nombre); ?>" required><br>
                        <input type="text" name="titulo" placeholder="Título" value="<?php echo esc_attr($elemento->titulo); ?>" required><br>
                        <input type="date" name="fecha" placeholder="Fecha" value="<?php echo esc_attr($elemento->fecha); ?>" required><br>
                        <input type="text" name="anio" placeholder="Año" value="<?php echo esc_attr($elemento->anio); ?>" required><br>
                        <input type="text" name="tag" placeholder="Tag" value="<?php echo esc_attr($elemento->tag); ?>" required><br>
                        <input type="text" name="imagen" placeholder="URL de la Imagen" value="<?php echo esc_url($elemento->imagen); ?>" required><br>
                        <textarea name="contenido" placeholder="Contenido" required><?php echo esc_textarea($elemento->contenido); ?></textarea><br>
                        <input type="text" name="url" placeholder="URL" value="<?php echo esc_url($elemento->url); ?>" required><br>
                        <input type="text" name="pais_medio" placeholder="País del Medio" value="<?php echo esc_attr($elemento->pais_medio); ?>" required><br>
                        <input type="text" name="pais_producto" placeholder="País del Producto" value="<?php echo esc_attr($elemento->pais_producto); ?>" required><br>
                        <input type="text" name="producto" placeholder="Producto" value="<?php echo esc_attr($elemento->producto); ?>" required><br>
                         <!-- Select para campo draft -->
            <select name="draft" required>
                <option value="0" <?php selected($elemento->draft, '0'); ?>>Draft</option>
                <option value="1" <?php selected($elemento->draft, '1'); ?>>Publicar</option>
            </select><br><br>
                        <input type="submit" name="submit" value="Guardar Cambios">
                    </form>
                </div>
            </div>
            <?php

            // Procesar formulario de edición
            if (isset($_POST['submit'])) {
                $medio_nombre = sanitize_text_field($_POST['medio_nombre']);
                $titulo = sanitize_text_field($_POST['titulo']);
                $fecha = sanitize_text_field($_POST['fecha']);
                $anio = sanitize_text_field($_POST['anio']);
                $tag = sanitize_text_field($_POST['tag']);
                $imagen = sanitize_text_field($_POST['imagen']);
                $contenido = sanitize_textarea_field($_POST['contenido']);
                $url = esc_url($_POST['url']);
                $pais_medio = sanitize_text_field($_POST['pais_medio']);
                $pais_producto = sanitize_text_field($_POST['pais_producto']);
                $producto = sanitize_text_field($_POST['producto']);
                $draft = sanitize_text_field($_POST['draft']);  // Sanitizar el valor de draft

                // Actualizar los datos en la tabla personalizada
                $wpdb->update(
                    $wpdb->prefix . 'news',
                    array(
                        'medio_nombre' => $medio_nombre,
                        'titulo' => $titulo,
                        'fecha' => $fecha,
                        'anio' => $anio,
                        'tag' => $tag,
                        'imagen' => $imagen,
                        'contenido' => $contenido,
                        'url' => $url,
                        'pais_medio' => $pais_medio,
                        'pais_producto' => $pais_producto,
                        'producto' => $producto,
                        'draft' => $draft  // Agregar el valor de draft
                    ),
                    array('id' => $id_elemento),
                    array('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s'), // Formato de los datos
                    array('%d') // Formato del where
                );

                echo '<div class="updated"><p>Datos actualizados correctamente.</p></div>';
            }
        } else {
            echo '<div class="error"><p>El elemento seleccionado no existe.</p></div>';
        }
    } else {
        echo '<div class="error"><p>No se ha proporcionado un ID de elemento válido.</p></div>';
    }
}

function formulario_cargar_datos() {
    global $wpdb;

    if (isset($_POST['submit'])) {
        // Sanitizar los datos del formulario
        $medio_nombre = sanitize_text_field($_POST['medio_nombre']);
        $titulo = sanitize_text_field($_POST['titulo']);
        $fecha = sanitize_text_field($_POST['fecha']);
        $anio = sanitize_text_field($_POST['anio']);
        $tag = sanitize_text_field($_POST['tag']);
        $imagen = sanitize_text_field($_POST['imagen']);
        $contenido = sanitize_textarea_field($_POST['contenido']);
        $url = esc_url($_POST['url']);
        $pais_medio = sanitize_text_field($_POST['pais_medio']);
        $pais_producto = sanitize_text_field($_POST['pais_producto']);
        $producto = sanitize_text_field($_POST['producto']);
        $draft = sanitize_text_field($_POST['draft']);  // Sanitizar el valor de draft

        // Insertar datos en la tabla personalizada
        $wpdb->insert(
            $wpdb->prefix . 'news',
            array(
                'medio_nombre' => $medio_nombre,
                'titulo' => $titulo,
                'fecha' => $fecha,
                'anio' => $anio,
                'tag' => $tag,
                'imagen' => $imagen,
                'contenido' => $contenido,
                'url' => $url,
                'pais_medio' => $pais_medio,
                'pais_producto' => $pais_producto,
                'producto' => $producto,
                'draft' => $draft  // Agregar el valor de draft
            )
        );
        echo '<div class="updated"><p>Datos guardados correctamente.</p></div>';
    }

    ?>
	<style>
        .form-wrap {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            width: 40%;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
        }

        input[type="text"],
        input[type="date"],
        input[type="url"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
    <div class="wrap">
        <h2>Cargar Datos</h2>
		<div class="form-wrap">
        <form method="post" action="">
            <input type="text" name="medio_nombre" placeholder="Medio Nombre" required><br>
            <input type="text" name="titulo" placeholder="Título" required><br>
            <input type="date" name="fecha" placeholder="Fecha" required><br>
            <input type="text" name="anio" placeholder="Año" required><br>
            <input type="text" name="tag" placeholder="Tag" required><br>
            <input type="text" name="imagen" placeholder="URL de la Imagen" required><br>
            <textarea name="contenido" placeholder="Contenido" required></textarea><br>
            <input type="text" name="url" placeholder="URL Artículo" required><br>
            <input type="text" name="pais_medio" placeholder="País del Medio" required><br>
            <input type="text" name="pais_producto" placeholder="País del Producto" required><br>
            <input type="text" name="producto" placeholder="Producto" required><br>
            <!-- Select para campo draft -->
            <select name="draft" required>
                <option value="0">Draft</option>
                <option value="1">Publicar</option>
            </select><br><br>
            <input type="submit" name="submit" value="Guardar">
        </form>
    </div>
	</div>
    <?php
}
