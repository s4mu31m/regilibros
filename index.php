<?php
require_once "partials/header.php";
require_once "vendor/autoload.php";
require_once 'database/config.php';

$documents = getMongoCollection('libros');

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

<div class="img-fluid">
    <div id="hero" class="hero-image">
        <img src="img/hero.webp" alt="libros bonitos" class="parallax-image">
    </div>
</div>

<!-- barra de búsqueda -->
<div class="container-xl container_busqueda">
    <div class="contenedor">
        <input type="text" id="searchBar" placeholder="Buscar" onkeyup="filterList()">
        <div class="btn lupa">
            <i class="fa fa-search"></i>
        </div>
    </div>
</div>

<div class="container-xl">
    <ul class="list-group mb-4" id="list">
        <?php foreach ($libros as $libro) {
            // Asumiendo que $libro['_id'] es un string o que puedes convertirlo a string
            $libroId = (string) $libro['_id'];
            echo "<li class='list-group-item d-flex justify-content-between align-items-center'>";
            echo htmlspecialchars($libro['title'], ENT_QUOTES, 'UTF-8');

            // Cambia el método a 'post'
            echo "<form action='portada.php' method='post'>";
            echo "<input type='hidden' name='libro_id' value='" . htmlspecialchars($libroId, ENT_QUOTES, 'UTF-8') . "'>";
            echo "<button type='submit' class='btn btn-primary btn-sm'>Ver</button>";
            echo "</form>";

            echo "</li>";
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