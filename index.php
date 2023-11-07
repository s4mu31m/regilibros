<?php require_once "partials/header.php"; ?>

    <div class="container-fluid">
        <!-- Título y barra de búsqueda -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>REGILIBROS</h1>
            <div class="d-flex align-items-center">
                <input type="search" class="form-control search-bar mr-2" placeholder="Buscar">
                <button class="btn btn-primary">Buscar</button>
            </div>
        </div>

        <!-- Imagen de libros -->
        <div class="hero-image" style="padding-bottom: 20px";>
            <img src="img/hero.jpg" class="img-fluid" alt="libros bonitos">
        </div>
    </div>
    <div class="container-xl">
        <ul class="list-group mb-4">
            <!-- Repite este bloque por cada elemento de la lista -->
            <li class="list-group-item">El gran Gatsby</li>
            <li class="list-group-item">Cien años de soledad</li>
            <li class="list-group-item">1984</li>
            <li class="list-group-item">Matar a un ruiseñor</li>
            <li class="list-group-item">El señor de los anillos</li>
            <li class="list-group-item">El código Da Vinci</li>
            <li class="list-group-item">El nombre del viento</li>
            <li class="list-group-item">La naranja mecánica</li>
            <li class="list-group-item">La sombra del viento</li>
            <li class="list-group-item">El psicoanalista</li>
            <li class="list-group-item">La chica del tren</li>
            <li class="list-group-item">El alquimista</li>
            <li class="list-group-item">El perfume</li>
            <li class="list-group-item">La isla del tesoro</li>
            <li class="list-group-item">La cabaña del tío Tom</li>
        </ul>
    
        <!-- Mapa y título -->
        <div class="container-xxl">
            <h2 class="text-center" style="font-weight: bold;">LIBRERÍAS CON LAS QUE TRABAJAMOS</h2>
            <div class="text-center">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d55300.98140859056!2d-71.3398898667401!3d-29.970481284791497!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9691d9cdb365d25d%3A0xe7fc112731895cc0!2sCoquimbo!5e0!3m2!1ses!2scl!4v1698974562378!5m2!1ses!2scl" width="700" height="550" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>

    <form action="send.php">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>


<?php require_once "partials/footer.php"; ?>