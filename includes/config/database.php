<?php 

function conectarDB() : mysqli{
    $db = mysqli_connect('localhost', 'laravel', '140735', 'bienesraices_crud');
    if (!$db) {
        echo "Error no se conecto";
        exit;
    }
    return $db;
}

/* function conectarDB() : mysqli{
    $db = new mysqli('localhost', 'ivan', '140735', 'bienesraices_crud');
    if (!$db) {
        echo "Error no se conecto";
        exit;
    }
    return $db;
} */