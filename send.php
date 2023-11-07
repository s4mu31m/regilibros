<?php

require_once "vendor/autoload.php";
require_once 'database/config.php'; // Asegúrate de que la ruta a config.php sea correcta

// Conectarse a la base de datos usando la configuración
$mongo = new MongoDB\Client($config['mongo_uri']);

// Seleccionar la base de datos y la colección
$collection = $mongo->selectCollection($config['mongo_db'], 'libros'); // 'books' fue cambiado a 'libros'

// Insertar el documento
$result = $collection->insertOne([
    'title' => 'hary potter',
    'author' => 'Patrick Rothfuss',
    'isbn' => '1234567890',
    'genre' => 'Fantasía',
    'ratings' => [],
    'availability' => []
]);

// Imprimir el ID del documento insertado
echo 'Documento insertado con ID: ' . $result->getInsertedId();

