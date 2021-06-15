<?php

// Inicio de todas las clases
require "../vendor/autoload.php";
// Inicia la configuración de la base de datos
require "../config/database.php";
// Cargo los productos
$products = App\Entities\Product::get();
// Cargo la vista
include "../resources/views/lists.php";
