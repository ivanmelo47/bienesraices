<?php

require 'funciones.php';
require 'config/database.php';
require __DIR__.'/../vendor/autoload.php';

// CONEXION A LA BASE DE DATOS
$db = conectarDB();

use App\Propiedad;

Propiedad::setDB($db);
