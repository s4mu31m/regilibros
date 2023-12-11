<?php
require_once 'database/config.php';

function getBooksFromDB()
{
    $documents = getMongoCollection('libros');
    $libros = [];
    foreach ($documents as $document) {
        $libros[] = $document;
    }
    return $libros;
}

function getBookInfoFromAPI($bookTitle)
{
    $url = "https://www.googleapis.com/books/v1/volumes?q=" . urlencode($bookTitle);
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($response);

    // Inicializa los valores por defecto para la imagen y la sinopsis
    $imageUrl = "img\gtsb.png";
    $synopsis = "Sinopsis no disponible.";

    if (!empty($data->items)) {
        $bookInfo = $data->items[0]->volumeInfo;

        // Comprueba si imageLinks y thumbnail existen antes de intentar acceder a ellos
        if (isset($bookInfo->imageLinks) && isset($bookInfo->imageLinks->thumbnail)) {
            $imageUrl = $bookInfo->imageLinks->thumbnail;
        }

        // Comprueba si description existe antes de intentar acceder a ella
        if (isset($bookInfo->description)) {
            // Decodifica entidades HTML y maneja secuencias de escape
            $synopsis = html_entity_decode(stripslashes($bookInfo->description));
        }
    }

    return [
        'imageUrl' => $imageUrl,
        'synopsis' => $synopsis
    ];
}
