<?php 

function conectarDB() : mysqli{
    $db = mysqli_connect('localhost', 'root', 'A140735bcd@18090315', 'bienesraices_crud');
    if (!$db) {
        echo "Error no se conecto";
        exit;
    }
    return $db;
}