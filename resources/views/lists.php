<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plantilla</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1>Listado de productos</h1>
                <?php
                    foreach ($products as $product) {
                        echo "<strong>{$product->name}</strong> - {$product->description} <br>";
                    }
                ?>
                <hr>
                <p>
                    <a href="pdf.php">Exportar en PDF</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>