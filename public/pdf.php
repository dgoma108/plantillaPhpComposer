<?php

require "../vendor/autoload.php";
require "../config/database.php";

// Captura y almacena el buffer de salida
ob_start();

$products = App\Entities\Product::get();

// Cargo/Genero la vista
include "../resources/views/lists.php";

$dompdf = new Dompdf\Dompdf();

// Paso el contenido del buffer a dompdf
$dompdf->loadHtml(ob_get_clean());
// Renderizado
$dompdf->render();
// Descarga el pdf
$dompdf->stream();
