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


