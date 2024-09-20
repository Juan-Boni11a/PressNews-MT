<!DOCTYPE html>
<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .news-header {
            display: flex;
            justify-content: left;
            background-color: #00243e;
            padding: 1em;
            padding-left: 5%;
        }

        .hamburger {
            display: none;
            position: absolute;
            right: 25px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 24px;
            cursor: pointer;
            color: white;
        }

        .remove-filter-button {

            position: absolute;
            right: 0px;
            top: 0;
            font-size: 24px;
            cursor: pointer;
            color: black;
        }

        .news-logo {
            width: 270px;
        }

        .news-body {
            display: flex;
            flex-direction: row;
            padding: 1em;

        }

        .sidenav {
            display: block;
            justify-content: center;
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding-left: 1em;
            padding-right: 1em;
            padding-top: 2em;
            padding-bottom: 2em;
            color: #00243e;
        }

        .sidenav i {
            font-size: 15px;
            color: #00243e;
        }

        .sidenav-title {
            font-weight: bold;
        }

        #filterForm {
            display: flex;
            justify-content: center;
            flex-direction: column;
            position: relative;
        }

        .news-icons {
            color: #00243e;
            font-size: 25px;
            margin-right: 7px;
        }

        .sidenav .search-news {
            border-radius: 5px;
            width: 100%;
            height: 35px;
            margin-bottom: 1em;
            margin-top: 1em;
            border-width: 1px;
        }

        .select-container {
            position: relative;
            display: inline-block;
            width: 100%;
            margin-top: 1em;
        }

        .select-container i {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            pointer-events: none;
        }

        .select-container select {
            padding-left: 40px;
            width: 100%;
            box-sizing: border-box;
        }

        .checkbox-container {
            margin-bottom: 15px;
        }

        .checkbox-container label {
            display: block;
            margin-bottom: 5px;
        }

        .checkbox-container input[type="checkbox"] {
            margin-right: 10px;

        }

        .select-dropdown {
            position: relative;
            display: inline-block;
            width: 100%;
            margin-bottom: 15px;
            height: 35px;
        }

        .dropdown-btn {
            background-color: #f9f9f9 !important;
            color: #333;
            padding: 10px 5px;
            border: none;
            cursor: pointer;
            width: 100%;
            text-align: left;
            font-size: 16px !important;
            border-radius: 4px !important;
            border: 1px solid #ccc;
        }

        .dropdown-content {
            display: none;
            background-color: #f9f9f9;
            padding: 10px;
            z-index: 1;
            width: 100%;
            border-top: 0;
            max-height: 200px;
            overflow-y: auto;
        }

        .dropdown-content label {
            display: block;
            padding: 0px;
            margin-bottom: 0px;
            font-family: "Barlow-optimizado" !important;
        }

        .dropdown-content label input[type="checkbox"] {
            margin-right: 10px;
        }

        .select-dropdown.active .dropdown-content {
            display: block;
        }

        .dropdown-btn::after {
            content: '\25BC';
            float: right;
            margin-right: 10px;
            font-size: 12px;
        }

        .sidenav .news-button {
            align-self: center;
            margin-top: 1em;
        }

        .news-button {
            background-color: #00243e !important;
            color: white !important;
            border-radius: 5px !important;
            padding: 10px 25px 10px 25px !important;
            width: 100%;
        }

        .news-menu-container {
            width: 25%;
            padding-top: 5%;
            padding-left: 5%;
            padding-right: 3em;
        }

        .cards-list {
            width: 75%;
            padding-left: 2em;
            padding-right: 5%;
            padding-bottom: 2em;
            display: flex;
            flex-wrap: wrap;
            gap: 1em;
            height: 80vh;
            overflow: scroll;
            margin: 0;
        }

        .cards-list h1 {
            color: #00243e !important;
        }

        .card {
            width: 32%;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding-top: 0;
            padding-bottom: 1em;
            color: #00243e;
            border-radius: 30px;
        }

        .card h3,
        p {
            margin-top: 10px;
            margin-bottom: 2px;
        }

        .card_news_tag {
            position: absolute;
            top: 0;
            left: 0;
            background-color: #00243e;
            color: white;
            margin: 1em;
            padding: 10px 20px 10px 20px;
            border-radius: 35px;
            z-index: 1;
        }

        .card_news_tag p {

            margin: 0;
            padding: 0;
        }

        .image-container {
            position: relative;
            height: 200px;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            border-radius: 20px 20px 0px 0px;
        }

        .news-main-info {
            padding: 1em;
        }

        .news-card-last {
            padding: 1em;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .news-card-last .card_news_product,
        i {
            font-size: 0.7em;
        }


        .modal {
            display: none;
            position: fixed;
            z-index: 999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            width: 80%;
            max-width: 600px;
            height: 60vh;
            border-radius: 15px;
            position: relative;
            overflow: scroll;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 24px;
            cursor: pointer;
        }

        .read-more-btn {
            background-color: transparent !important;
            border: none !important;
            font-style: italic !important;
            color: #00243e !important;
            text-decoration: underline !important;
            text-transform: none !important;
            padding: 0 !important;
            font-size: 0.7em !important;
        }

        .card_news_url {
            font-style: italic;
            color: #00243e;
            text-decoration: underline !important;
        }

        .card_news_product {
            background-color: lightgray;
            border-radius: 15px;
            padding: 2px 7px;
            text-align: center;
        }

        .card_news_date {
            color: gray;
        }


        @media (max-width: 1366px) {

            .news-menu-container {
                padding-left: 3em;
                padding-right: 1em;
            }

            .cards-list {
                padding-right: 3em;
            }

            .card {
                width: 45%;
            }

            .news-header {
                padding-left: 3em;
            }

        }

        @media (max-width: 1024px) {

            .news-menu-container {
                padding-left: 1em;
                padding-right: 2em;
            }

            .cards-list {
                padding-right: 1em;
            }

            .card {
                width: 45%;
            }

            .news-header {
                padding-left: 1em;
            }

        }

        @media (max-width: 768px) {
            .news-body {
                flex-direction: column;

            }

            .sidenav {
                display: block;
            }

            .news-menu-container {
                padding-left: 1em;
                padding-right: 1em;
            }

            .news-menu-container {
                width: 100%;
                display: none;
            }

            .cards-list {
                padding-right: 1em;
                padding-left: 1em;
                overflow: auto;
                padding-bottom: 1em;
                width: 100%;
            }

            .card {
                width: 100%;
            }

            .news-header {
                justify-content: center;
                position: relative;
            }

            .hamburger {
                display: block;
            }
        }
    </style>

</head>

<body>

    <?php

    function crearCard($medio_nombre, $titulo, $fecha, $anio, $tag, $imagen, $contenido, $url, $pais_medio, $pais_producto, $producto, $id)
    {
        // Limitar el contenido y titulo
        $contenido_truncado = (strlen($contenido) > 100) ? substr($contenido, 0, 100) . '...' : $contenido;
        $titulo_truncado = (strlen($titulo) > 100) ? substr($titulo, 0, 35) . '...' : $titulo;

        echo '<div class="card" data-card-id="' . $id . '" data-full-content="' . htmlspecialchars($contenido) . '">';

        echo '<div class="image-container" style="background-image: url(\'' . $imagen . '\');">';
        echo '<div class="card_news_tag"><p>' . $tag . '</p></div>';
        echo '</div>';

        echo '<div class="news-main-info">'; // Segunda fila
        echo '<h3 class="card_news_title">' . $titulo_truncado . '</h3> ';
        echo '<p class="card_news_medio">' . $medio_nombre . ' - ' . $pais_medio . '</p>';
        echo '<p class="card_news_date"><i class="fa-regular fa-calendar" style=" margin-right: 5px;"></i>' . $fecha . '</p>';
        echo '<p class="card_news_content">' . $contenido_truncado . '</p>';
        echo '<button class="read-more-btn" data-card-id="' . $id . '">View more</button>';

        echo '</div>';

        echo '<div class="news-card-last">'; // Tercera fila
        echo '<a class="card_news_url" href="' . $url . '" target="_blank">Go to site</a>';
        echo '<p class="card_news_product">' . $producto . ' - ' . $pais_producto . '</p>';
        echo '</div>';

        echo '</div>';
    }


    global $wpdb;
    $sql = "SELECT * FROM {$wpdb->prefix}news WHERE draft = true";

    // Verificar si se ha marcado el checkbox para volver a consultar y obtener todos los resultados
    if (isset($_GET['todos']) && $_GET['todos'] == 'true') {
        $sql = "SELECT * FROM {$wpdb->prefix}news";
    } else {
        $conditions = [];

        if (!empty($_GET['titulo_busqueda'])) {
            $titulo_busqueda = esc_sql($_GET['titulo_busqueda']);
            $conditions[] = "titulo LIKE '%$titulo_busqueda%'";
        }

        if (!empty($_GET['tag']) && is_array($_GET['tag'])) {
            $tags = array_map('esc_sql', $_GET['tag']);
            $conditions[] = "tag IN ('" . implode("','", $tags) . "')";
        }

        if (!empty($_GET['producto']) && is_array($_GET['producto'])) {
            $productos = array_map('esc_sql', $_GET['producto']);
            $conditions[] = "producto IN ('" . implode("','", $productos) . "')";
        }

        if (!empty($_GET['anio']) && is_array($_GET['anio'])) {
            $anios = array_map('esc_sql', $_GET['anio']);
            $conditions[] = "anio IN ('" . implode("','", $anios) . "')";
        }

        // Unir todas las condiciones
        if (!empty($conditions)) {
            $sql .= " AND " . implode(' OR ', $conditions);
        }
    }

    // Realizar la consulta a la tabla personalizada
    $cards_query = $wpdb->get_results($sql);


    //CONSTRUIR JSON
    $url_actual = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; // Obtener la URL actual
    $parte_a_excluir = "http://localhost:10004/elementor-6/?";
    $url_limpia = str_replace($parte_a_excluir, "", $url_actual);

    $log = new stdClass();
    $log->url = $url_limpia;
    $log->timestamp = date('Y-m-d H:i:s');
    $log->data = $cards_query;

    // Convertir el objeto de log a JSON
    $json_log = json_encode($log, JSON_PRETTY_PRINT);
    echo "<script>console.log($json_log);</script>";

    ?>

    <!-- MODAL PARA CADA CARD -->
    <div id="newsModal" class="modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <h3 id="modal-title"></h3>
            <p id="modal-content"></p>
            <p class="card_news_date" id="modal-date"></p>
            <p class="card_news_product" id="modal-product"></p>
            <a class="card_news_url" id="modal-url" href="#" target="_blank">Go to site</a>
        </div>
    </div>

    <div class="news-header"><img class="news-logo" src="https://www.metropolitan-touring.com/wp-content/uploads/2023/10/metropolitan-touring-logo-blanco.svg">
        <div id="hamburger-icon" class="hamburger">
            &#9776;
        </div>
    </div>

    <div class="news-body">
        <!--MENU FILTRO-->
        <div class="news-menu-container">
            <div id="mySidenav" class="sidenav">
                <form id="filterForm" method="GET" action="">
                    <div class="sepContainer">
                        <p class="sidenav-title">Filter:</p>
                        <input class="search-news" type="text" name="titulo_busqueda" id="tituloBusqueda" placeholder="Find by title" value="<?php echo isset($_GET['titulo_busqueda']) ? esc_attr($_GET['titulo_busqueda']) : ''; ?>">
                    </div>

                    <div class="sepContainer">
                        <div class="select-dropdown">
                            <button type="button" class="dropdown-btn">
                                <i class="fa-regular fa-rectangle-list"></i> Categories
                            </button>
                            <div class="dropdown-content">
                                <?php foreach ($wpdb->get_results("SELECT DISTINCT tag FROM {$wpdb->prefix}news WHERE draft = true") as $categoria): ?>
                                    <label>
                                        <input type="checkbox" name="tag[]" value="<?php echo esc_attr($categoria->tag); ?>" <?php echo (isset($_GET['tag']) && in_array($categoria->tag, $_GET['tag'])) ? 'checked' : ''; ?>>
                                        <?php echo esc_html($categoria->tag); ?>
                                    </label><br>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <div class="sepContainer">
                        <div class="select-dropdown">
                            <button type="button" class="dropdown-btn">
                                <i class="fa-regular fa-folder-closed"></i> Products
                            </button>
                            <div class="dropdown-content">
                                <?php foreach ($wpdb->get_results("SELECT DISTINCT producto FROM {$wpdb->prefix}news WHERE draft = true") as $producto): ?>
                                    <label>
                                        <input type="checkbox" name="producto[]" value="<?php echo esc_attr($producto->producto); ?>" <?php echo (isset($_GET['producto']) && in_array($producto->producto, $_GET['producto'])) ? 'checked' : ''; ?>>
                                        <?php echo esc_html($producto->producto); ?>
                                    </label><br>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <div class="sepContainer">
                        <div class="select-dropdown">
                            <button type="button" class="dropdown-btn">
                                <i class="fa-regular fa-calendar"></i> Years
                            </button>
                            <div class="dropdown-content">
                                <?php foreach ($wpdb->get_results("SELECT DISTINCT anio FROM {$wpdb->prefix}news WHERE draft = true") as $anio): ?>
                                    <label>
                                        <input type="checkbox" name="anio[]" value="<?php echo esc_attr($anio->anio); ?>" <?php echo (isset($_GET['anio']) && in_array($anio->anio, $_GET['anio'])) ? 'checked' : ''; ?>>
                                        <?php echo esc_html($anio->anio); ?>
                                    </label><br>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>




                    <button class="news-button" type="submit">Search</button>

                    <div id="todosButton" class="remove-filter-button" alt="Quitar Filtros">
                        <i class="fa-regular fa-trash-can"></i>
                    </div>

                </form>
            </div>
        </div>


        <div class="cards-list">
            <h1>Press & News</h1>
            <p class="introText">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <?php
            if ($cards_query) {
                foreach ($cards_query as $card) {
                    $medio_nombre = $card->medio_nombre;
                    $titulo = $card->titulo;
                    $fecha = $card->fecha;
                    $anio = $card->anio;
                    $tag = $card->tag;
                    $imagen = $card->imagen;
                    $contenido = $card->contenido;
                    $url = $card->url;
                    $pais_medio = $card->pais_medio;
                    $pais_producto = $card->pais_producto;
                    $producto = $card->producto;
                    $id = $card->id;

                    crearCard($medio_nombre, $titulo, $fecha, $anio, $tag, $imagen, $contenido, $url, $pais_medio, $pais_producto, $producto, $id);
                }
            } else {

                echo 'No se encontraron cards.';
            }
            ?>
        </div>
    </div>


    <script>
        //ABRIR-CERRAR MOBILE MENU
        const hamburgerIcon = document.getElementById('hamburger-icon');
        hamburgerIcon.addEventListener('click', function() {
            const newsMenuContainer = document.querySelector('.news-menu-container');
            if (newsMenuContainer.style.display === 'block') {
                newsMenuContainer.style.display = 'none';
                hamburgerIcon.innerHTML = '&#9776;'; // Ícono hamburguesa
                hamburgerIcon.classList.remove('open');
            } else {
                // Si está oculto, lo mostramos y cambiamos el ícono a "X"
                newsMenuContainer.style.display = 'block';
                hamburgerIcon.innerHTML = '&#10005;';
                hamburgerIcon.classList.add('open');
            }
        });


        // DROPDOWNS MENU
        document.addEventListener('DOMContentLoaded', function() {
            // Obtener todos los dropdowns
            const dropdowns = document.querySelectorAll('.dropdown-btn');

            // Agregar evento de clic a cada botón del dropdown
            dropdowns.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.stopPropagation(); // Evitar que el clic en el botón cierre el dropdown

                    // Cerrar otros dropdowns
                    dropdowns.forEach(otherButton => {
                        const otherDropdownContainer = otherButton.parentElement;
                        if (otherButton !== button) {
                            otherDropdownContainer.classList.remove('active');
                        }
                    });

                    const dropdownContainer = this.parentElement;
                    dropdownContainer.classList.toggle('active');
                });
            });

            // Cerrar el dropdown si el usuario hace clic fuera
            window.addEventListener('click', function() {
                dropdowns.forEach(button => {
                    const dropdownContainer = button.parentElement;
                    dropdownContainer.classList.remove('active');
                });
            });

            // Evitar que el dropdown se cierre al hacer clic dentro del contenedor
            const dropdownContents = document.querySelectorAll('.dropdown-content');
            dropdownContents.forEach(content => {
                content.addEventListener('click', function(event) {
                    event.stopPropagation();
                });
            });
        });



        //CONTROLADOR POP UP
        jQuery(document).ready(function($) {

            $('.read-more-btn').on('click', function() {
                var cardId = $(this).data('card-id');
                var cardElement = $('.card[data-card-id="' + cardId + '"]');

                var titulo = cardElement.find('.card_news_title').text();
                var contenidoCompleto = cardElement.data('full-content');
                var fecha = cardElement.find('.card_news_date').text();
                var producto = cardElement.find('.card_news_product').text();
                var url = cardElement.find('.card_news_url').attr('href');

                // Asignar los datos al modal
                $('#modal-title').text(titulo);
                $('#modal-content').text(contenidoCompleto);
                $('#modal-date').text(fecha);
                $('#modal-product').text(producto);
                $('#modal-url').attr('href', url);

                $('#newsModal').show();
            });

            $('.close-btn').on('click', function() {
                $('#newsModal').hide();
            });

            $(window).on('click', function(event) {
                if (event.target.id === 'newsModal') {
                    $('#newsModal').hide();
                }
            });
        });

        //ELIMINAR FILTROS

        document.getElementById('todosButton').addEventListener('click', function() {

            document.getElementById('filterForm').reset();
            window.location.href = window.location.pathname;
        });
    </script>

</body>

</html>