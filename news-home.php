<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>

    .news-header{
        display: flex;
        justify-content: left;
        background-color: #00243e;
        padding: 1em;
        padding-left: 10%;
    }

/* Estilos del ícono hamburguesa */
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

    .news-logo{
        width: 270px;
    }

    .news-body{
        display: flex;
        flex-direction: row;
        padding: 1em; 

    }
    .sidenav{
        display: flex;
        justify-content: center;
        width: 100%;
        border-radius: 30px; /* Borde redondeado */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Sombra sutil */
        padding-left: 1em;
        padding-right: 1em;
        padding-top: 2em;
        padding-bottom: 4em;
        color: #00243e;
    }
    #filterForm{
    display: flex;
    justify-content: center;
    flex-direction: column;
    }

    .news-icons{
        color: #00243e;
        font-size: 25px;
        margin-right: 7px;
    }

    .sidenav input, select{
        border-radius: 5px;
        width: 100%;
        height: 35px;
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
    pointer-events: none; /* Evita que el ícono interfiera con la selección */
}

.select-container select {
    padding-left: 40px;
    width: 100%;
    box-sizing: border-box;
}


    .sidenav .news-button{
        align-self: center;
        margin-top: 1em;
    }

    .news-button{
        background-color: #00243e;
        color: white;
        border-radius: 25px;
        padding: 10px 25px 10px 25px;
    }

    .news-menu-container{
        width: 25%;
        padding-left: 10%;
        padding-right: 3em;
    }

    .cards-list { 
    width: 75%;
    padding-left: 2em;
    padding-right: 10%;
    padding-bottom: 2em;
    display: flex;
    flex-wrap: wrap;
    gap: 1em; 
    height: 80vh;
    overflow: scroll;
    margin: 0;
}

    .card{
        width: 32%;
        border-radius: 20px; /* Borde redondeado */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Sombra sutil */
        padding-top: 0;
        padding-bottom: 1em;
        color: #00243e;
        border-radius: 30px;
    }

    .card h3,p{
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
.card_news_tag p{
    
    margin: 0;
    padding: 0;
}

.image-container{
    position: relative;
    height: 200px;
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    border-radius: 20px 20px 0px 0px;
}
.news-main-info{
    padding: 1em;
}
.news-card-last {
    padding: 1em;
    display: flex; /* Usar flexbox para alinear los elementos */
    justify-content: space-between; /* Espaciado uniforme entre los elementos y en los extremos */
    align-items: center; /* Alinear los elementos verticalmente al centro, opcional */
}

.news-card-last .card_news_product, i{
    font-size: 0.7em;
}



/* Estilos básicos para el modal */
.modal {
    display: none; /* Oculto por defecto */
    position: fixed;
    z-index: 999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Fondo oscuro */
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
.read-more-btn{
    background-color: transparent;
    border: none;
    font-style: italic;
    color: #00243e;
    text-decoration: underline;
}
.card_news_url{
    font-style: italic;
    color: #00243e;
    text-decoration: underline !important;
}
.card_news_product{
    background-color: lightgray;
    border-radius: 15px;
    padding: 2px 7px;
    text-align: center;
}
.card_news_date{
    color: gray;
}


/* Laptop (1024px y superior) */
@media (max-width: 1366px) {

.news-menu-container{
    padding-left: 3em;
    padding-right: 1em;
}
.cards-list{
    padding-right: 3em;
}
.card{
    width: 45%;
}
.news-header{
    padding-left: 3em;
    }

}
@media (max-width: 1024px) {

    .news-menu-container{
        padding-left: 1em;
        padding-right: 2em;
    }
    .cards-list{
        padding-right: 1em;
    }
    .card{
        width: 45%;
    }
    .news-header{
    padding-left: 1em;
    }
   
}

/* Tablet (entre 768px y 1024px) */
@media (max-width: 768px) {
    .news-body{
        flex-direction: column;
        
    }
    .news-menu-container{
        padding-left: 1em;
        padding-right: 1em;
    }
    .news-menu-container{
        width: 100%;
        display: none;
    }
    .cards-list{
        padding-right: 1em;
        padding-left: 1em;
        overflow: auto;
        padding-bottom: 1em;
        width: 100%;
    }
    .card{
        width: 100%;
    }
    .news-header{
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
// Función para crear una card reutilizable
function crearCard($medio_nombre, $titulo, $fecha, $anio, $tag, $imagen, $contenido, $url, $pais_medio, $pais_producto, $producto, $id)
{
    // Limitar el contenido a 100 caracteres para mostrar en la tarjeta
    $contenido_truncado = (strlen($contenido) > 100) ? substr($contenido, 0, 100) . '...' : $contenido;

    echo '<div class="card" data-card-id="' . $id . '" data-full-content="' . htmlspecialchars($contenido) . '">'; // Almacenar el contenido completo en data-full-content

    echo '<div class="image-container" style="background-image: url(\'' . $imagen . '\');">';
    echo '<div class="card_news_tag"><p>' . $tag . '</p></div>'; 
    echo '</div>'; 

    echo '<div class="news-main-info">'; // Segunda fila
    echo '<h3 class="card_news_title">' . $titulo . '</h3> ';
    echo '<p class="card_news_medio">' . $medio_nombre . ' - ' . $pais_medio . '</p>';
    echo '<p class="card_news_date"><i class="fa-regular fa-calendar" style=" margin-right: 5px;"></i>' . $fecha . '</p>';
    
    // Mostrar el contenido truncado y el botón de "Leer más"
    echo '<p class="card_news_content">' . $contenido_truncado . '</p>';
    echo '<button class="read-more-btn" data-card-id="' . $id . '">Ver más</button>'; // Botón de "Leer más"
    
    echo '</div>';

    echo '<div class="news-card-last">'; // Tercera fila
    echo '<a class="card_news_url" href="' . $url . '" target="_blank">Ir al sitio</a>';
    echo '<p class="card_news_product">' . $producto . ' - ' . $pais_producto . '</p>';
    echo '</div>';

    echo '</div>';
}



global $wpdb;

// Construir la consulta base
$sql = "SELECT * FROM {$wpdb->prefix}news WHERE draft = true";

// Verificar si se ha marcado el checkbox para volver a consultar y obtener todos los resultados
if (isset($_GET['todos']) && $_GET['todos'] == 'true') {
    $sql = "SELECT * FROM {$wpdb->prefix}news";
} else {
    $conditions = [];

    // Verificar si se ha ingresado texto para buscar por título
    if (!empty($_GET['titulo_busqueda'])) {
        $titulo_busqueda = esc_sql($_GET['titulo_busqueda']);
        $conditions[] = "titulo LIKE '%$titulo_busqueda%'";
    }

    // Verificar si se han seleccionado etiquetas para filtrar
    if (!empty($_GET['tag']) && is_array($_GET['tag'])) {
        $tags = array_map('esc_sql', $_GET['tag']);
        $conditions[] = "tag IN ('" . implode("','", $tags) . "')";
    }

    // Verificar si se han seleccionado productos para filtrar
    if (!empty($_GET['producto']) && is_array($_GET['producto'])) {
        $productos = array_map('esc_sql', $_GET['producto']);
        $conditions[] = "producto IN ('" . implode("','", $productos) . "')";
    }

    // Verificar si se han seleccionado años para filtrar
    if (!empty($_GET['anio']) && is_array($_GET['anio'])) {
        $anios = array_map('esc_sql', $_GET['anio']);
        $conditions[] = "anio IN ('" . implode("','", $anios) . "')";
    }

    // Unir todas las condiciones con AND si hay alguna
    if (!empty($conditions)) {
        $sql .= " AND " . implode(' OR ', $conditions);
    }
}

// Realizar la consulta a la tabla personalizada
$cards_query = $wpdb->get_results($sql);


// Obtener la URL actual
$url_actual = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// Excluir parte específica de la URL
$parte_a_excluir = "http://localhost:10004/elementor-6/?";
$url_limpia = str_replace($parte_a_excluir, "", $url_actual);

$log = new stdClass();
$log->url = $url_limpia;
$log->timestamp = date('Y-m-d H:i:s'); // Formato de fecha y hora
$log->data = $cards_query; // Aquí asumimos que $cards_query contiene los resultados de tu consulta

// Convertir el objeto de log a JSON
$json_log = json_encode($log, JSON_PRETTY_PRINT);

// Guardar el log en un archivo (opcional)
//file_put_contents('consulta_log.json', $json_log);
// Pasar el JSON a JavaScript para imprimir en la consola
echo "<script>console.log($json_log);</script>";

?>

<!-- Modal -->
<div id="newsModal" class="modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <h3 id="modal-title"></h3>
        <p id="modal-content"></p>
        <p class="card_news_date" id="modal-date"></p>
        <p class="card_news_product" id="modal-product"></p>
        <a class="card_news_url" id="modal-url" href="#" target="_blank">Leer más en el sitio</a>
    </div>
</div>

<div class="news-header"><img class="news-logo" src="https://www.metropolitan-touring.com/wp-content/uploads/2023/10/metropolitan-touring-logo-blanco.svg">
<div id="hamburger-icon" class="hamburger">
        &#9776; 
    </div>
</div>

<div class="news-body">
<div class="news-menu-container">
<div id="mySidenav" class="sidenav">
<form id="filterForm" method="GET" action="">
    <!-- Búsqueda por Título -->
    <div class="sepContainer">
        <p class="sidenav-title">Buscar:</p>
        <input class="search-news" type="text" name="titulo_busqueda" id="tituloBusqueda" placeholder="Buscar por título">
    </div>

   <!-- Filtro por Categoría -->
   <div class="sepContainer">
    <div class="select-container">
        <i class="news-icons fa-solid fa-border-all"></i>
        <select name="tag[]" id="filtroCategoria" class="dropdown">
            <option value="">Categoría</option>
            <?php foreach ($wpdb->get_results("SELECT DISTINCT tag FROM {$wpdb->prefix}news WHERE draft = true") as $categoria): ?>
                <option value="<?php echo esc_attr($categoria->tag); ?>"><?php echo esc_html($categoria->tag); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<!-- Filtro por Producto -->
<div class="sepContainer">
    <div class="select-container">
        <i class="news-icons fa-solid fa-hotel"></i>
        <select name="producto[]" id="filtroProducto" class="dropdown">
            <option value="">Productos</option>
            <?php foreach ($wpdb->get_results("SELECT DISTINCT producto FROM {$wpdb->prefix}news WHERE draft = true") as $producto): ?>
                <option value="<?php echo esc_attr($producto->producto); ?>"><?php echo esc_html($producto->producto); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<!-- Filtro por Año -->
<div class="sepContainer">
    <div class="select-container">
        <i class="news-icons fa-regular fa-calendar"></i>
        <select name="anio[]" id="filtroAnio" class="dropdown">
            <option value="">Años</option>
            <?php foreach ($wpdb->get_results("SELECT DISTINCT anio FROM {$wpdb->prefix}news WHERE draft = true") as $anio): ?>
                <option value="<?php echo esc_attr($anio->anio); ?>"><?php echo esc_html($anio->anio); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>



    <button class="news-button" type="submit">Filtrar</button>
    <button class="news-button" type="button" id="todosButton">Quitar Filtros</button><br>
</form>
</div>
</div>


<div class="cards-list">
<h1 >Press & News</h1>
<p class="introText">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit 
    in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <?php 
            // Verificar si hay resultados encontrados
            if ($cards_query) {
                // Recorrer cada "card"
                foreach ($cards_query as $card) {
                    // Obtener los valores de los campos
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

                    // Llamar a la función crearCard con los datos obtenidos
                    crearCard($medio_nombre, $titulo, $fecha, $anio, $tag, $imagen, $contenido, $url, $pais_medio, $pais_producto, $producto,$id);
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
        hamburgerIcon.innerHTML = '&#10005;'; // Ícono "X"
        hamburgerIcon.classList.add('open');
    }
});


//CONTROLADOR POP UP
jQuery(document).ready(function($) {
    // Manejar el clic en el botón "Leer más"
    $('.read-more-btn').on('click', function() {
        var cardId = $(this).data('card-id');
        var cardElement = $('.card[data-card-id="' + cardId + '"]');

        // Obtener los datos de la tarjeta seleccionada
        var titulo = cardElement.find('.card_news_title').text();
        var contenidoCompleto = cardElement.data('full-content'); // Obtener el contenido completo
        var fecha = cardElement.find('.card_news_date').text();
        var producto = cardElement.find('.card_news_product').text();
        var url = cardElement.find('.card_news_url').attr('href');

        // Asignar los datos al modal
        $('#modal-title').text(titulo);
        $('#modal-content').text(contenidoCompleto); // Mostrar el contenido completo en el modal
        $('#modal-date').text(fecha);
        $('#modal-product').text(producto);
        $('#modal-url').attr('href', url);

        // Mostrar el modal
        $('#newsModal').show();
    });

    // Manejar el clic en el botón de cerrar modal
    $('.close-btn').on('click', function() {
        $('#newsModal').hide();
    });

    // Cerrar el modal cuando el usuario haga clic fuera del contenido
    $(window).on('click', function(event) {
        if (event.target.id === 'newsModal') {
            $('#newsModal').hide();
        }
    });
});


 //ELIMINAR FILTROS

    document.getElementById('todosButton').addEventListener('click', function() {
    // Reiniciar el formulario
    document.getElementById('filterForm').reset();
    window.location.href = window.location.pathname; // Recargar la página sin parámetros
});



</script>  

</body>
</html> 


