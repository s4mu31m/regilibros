<?php 
require_once "partials/header.php"; 
require_once "vendor/autoload.php";
require_once 'database/config.php'; // Asegúrate de que la ruta a config.php sea correcta

// Conectarse a la base de datos usando la configuración
$mongo = new MongoDB\Client($config['mongo_uri']);

// Seleccionar la base de datos y la colección
$collection = $mongo->selectCollection($config['mongo_db'], 'libros');

// Obtener todos los documentos de la colección
$documents = $collection->find();

// Guardar los documentos en un array
$libros = [];
foreach ($documents as $document) {
    $libros[] = $document;
}



?>
<header class="header">
    <div class="logo">
        <img src="img/logo.png" alt="">
    </div>
    <nav>
        <ul class="nav-list">
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Librerias</a></li>
            <li><a href="#">Encuentra</a></li>
        </ul>
    </nav>

</header>

<div class="container-fluid">
    <!-- Imagen de libros -->
    <div class="hero-image" style="padding-bottom: 20px;">
        <img src="img\hero.jpg" class="img-fluid" alt="libros bonitos">
    </div>
</div>
<!-- barra de búsqueda -->
<div class="contenedor">
    <input type="text" id="searchBar" placeholder="Buscar" onkeyup="filterList()">
    <div class="btn">
        <i class="fa fa-search"></i>
    </div>
</div>

<div class="container-xl">
    <ul class="list-group mb-4"id="list">
        <!-- Repite este bloque por cada elemento de la lista -->
        <?php foreach ($libros as $libro) {
        echo ("<li class='list-group-item'>". htmlspecialchars($libro['title'], ENT_QUOTES, 'UTF-8') ."</li>");
    } ?>
        
    </ul>

    <!-- Mapa y título -->
    <div class="container-xxl">
        <h2 class="text-center" style="font-weight: bold;">LIBRERÍAS CON LAS QUE TRABAJAMOS</h2>
        <div class="text-center">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d55300.98140859056!2d-71.3398898667401!3d-29.970481284791497!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9691d9cdb365d25d%3A0xe7fc112731895cc0!2sCoquimbo!5e0!3m2!1ses!2scl!4v1698974562378!5m2!1ses!2scl" width="700" height="550" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>
</div>

</div>



<?php require_once "partials/footer.php"; ?>