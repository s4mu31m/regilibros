<?php
require_once 'partials/header.php';
require_once 'vendor/autoload.php';
require_once 'functions/functions.php';

$libros = getBooksFromDB();
$book = null;

// Procesamiento de POST y búsqueda de libro específico
if (isset($_POST['libro_id'])) {
  $id = $_POST['libro_id'];
  foreach ($libros as $libro) {
    if ((string) $libro['_id'] == $id) {
      $book = $libro;
      break;
    }
  }
}

if ($book !== null) {
  $bookInfo = getBookInfoFromAPI($book['title']);
  $imageUrl = $bookInfo['imageUrl'];
  $synopsis = $bookInfo['synopsis'];
}
?>

<div class="container glasmorphic-container">
  <div class="row">
    <div class="col-12 text-center">
      <h1 class="book-title"><?php echo htmlspecialchars($book['title'], ENT_QUOTES, 'UTF-8'); ?></h1>
    </div>
    <div class="col-md-6">
      <!-- Contenido de la imagen del libro aquí -->
      <img src="<?php echo $imageUrl; ?>" alt="Portada del libro" class="img-fluid img-libro">
    </div>
    <div class="col-md-6">
      <h2>Disponibilidad</h2><br>
      <div class="container">
        <ul class="list-group">
          <li class="list-group-dis">Encuentralo en:</li>
          <?php
          if ($book !== null) {
            // El libro fue encontrado
            // Aquí puedes incluir el código para mostrar la información del libro

            // Verificar si el array "availability" está presente en el libro
            if (isset($book['availability'])) {
              $availability = $book['availability'];

              // Listar el contenido del array "availability"
              foreach ($availability as $item) {
                echo "- " . $item . "<br>";
              }
            } else {
              echo "El libro no tiene información de disponibilidad.";
            }
          } else {
            // Libro no encontrado
            echo "Libro no encontrado.";
          } ?>
        </ul>
      </div>


    </div>
  </div>

  <div class="info-general">
    <h2>Información general</h2>
    <br>
    <ul class="list">
      <li class="list-group-inf">Autor: <?php echo htmlspecialchars($book['author'], ENT_QUOTES, 'UTF-8'); ?></li>
      <li class="list-group-inf">Género: <?php echo htmlspecialchars($book['genre'], ENT_QUOTES, 'UTF-8'); ?></li>
    </ul>

    <h3>Sinopsis</h3><br>
    <p><?php echo htmlspecialchars($synopsis, ENT_QUOTES, 'UTF-8');?></p>


  </div>

</div>
<?php require_once 'partials\footer.php'; ?>