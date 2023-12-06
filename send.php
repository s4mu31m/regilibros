<?php

require_once "vendor/autoload.php";
require_once 'database/config.php'; // Asegúrate de que la ruta a config.php sea correcta

// Conectarse a la base de datos usando la configuración
$mongo = new MongoDB\Client($config['mongo_uri']);

// Seleccionar la base de datos y la colección
$collection = $mongo->selectCollection($config['mongo_db'], 'libros');

// Leer el contenido del archivo JSON
$jsonData = file_get_contents('data.json');
$data = json_decode($jsonData, true); // Decodifica el JSON como un array asociativo de PHP

// Verificar si el archivo JSON está bien formado y no está vacío
if (is_array($data)) {
    foreach ($data as $document) {
        // Insertar cada documento en la colección
        $result = $collection->insertOne($document);
        // Puedes verificar el resultado de cada inserción aquí, si lo deseas
    }
} else {
    // Manejar error si el JSON no es válido o está vacío
    echo "Error en el formato del archivo JSON o archivo vacío.";
}

