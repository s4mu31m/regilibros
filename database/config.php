<?php

require_once "vendor/autoload.php";

// Cargar las variables de entorno
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Configuración de la conexión a la base de datos MongoDB
$config = [
    'mongo_uri' => $_ENV['MONGO_URI'],
    'mongo_db' => $_ENV['MONGO_DB']
];
function getMongoCollection($collectionName)
{
    global $config;
    $mongo = new MongoDB\Client($config['mongo_uri']);
    $collection = $mongo->selectCollection($config['mongo_db'], $collectionName);
    return $collection->find();
};
