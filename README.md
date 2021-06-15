# PLANTILLA PHP CON COMPOSER, ELOQUENT Y PDF

Esta es una guía de un curso gratuito de internet de **Rimorsoft Online** de PHP y Composer, para mí de los mejores.

[Ver curso de Youtube](https://www.youtube.com/playlist?list=PLhCiuvlix-rQyjCLuciZ5XGXv2PBfO4HG)

El proyecto básico original está en:

[Ver proyecto en Github](https://github.com/rimorsoft/PHP-Basico)

La única diferencia es que he añadido PHPUnit.




## CREACIÓN DEL PROYECTO

### Instalar Composer

Entramos en consola en la carpeta del proyecto e instalamos composer con
```
composer init
```
Esto arrancar un asistente de configuración del proyecto que creará el archivo **composer.json**

y seguimos introduciendo lo que nos pide ...
Description: Descripción del paquete
Author: nombre de nuestro github
Minimum Stability: Ponemos dev
Package type: project
License: MIT

Después nos pide las dependencias que queremos instalar e instalamos:
1. database -> illuminate/database (Eloquent. Averiguar versión a instalar)
2. dompdf -> dompdf/dompdf
3. phpunit -> Opcional
4. Si queremos podemos uinstalar PHPUnit
Cuando estemos le decimos que no necesitamos más dependencias

Con esto, ya tendremos nuestro archivo composer.json creado.
Una vez configurado composer, lo instalamos en caso de que no lo haya hecho.

```
composer install
```

## Estructura del proyecto ##

Ahora creamos las siguientes carpetas:

/app 

/app/Entities -> Para los modelos

/config

/public

/resources 

/resources/views

/tests


Luego creamos los siguientes archivos básicos:

/app/Entities/Product.php -> !!! En singular

/config/database.php -> En minúsculas porque no es una clase

/public/index.php

/public/pdf.php

/resources/views/lists.php

/phpunit.xml

/tests/ExampleTest.php

## Autoload

Para poder hacer uso de los espacios de nombre (namespace) de modo automática cuando se cargue el proyecto, lo haremos añadiendo el siguiente código al archivo **composer.json** justo después del **require**
```json
"autoload": {
    "psr-4": {
        "App\\": "app/"
    }
},
```
Con esto le decimos que todo lo que está en la carpeta /app pertenece al namespace App\

Ahora hay que dar de alta esta coniguración en composer. Para ello desde la línea de comandos, ejecutamos:
```
composer dump-autoload
```
Lo que hace esto, es añadir una línea de código de registro al archivo /vendor/composer/autoload_psr4.php



## Contenido de los archivos

### /config/database.php

```php
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
	'driver' =>'mysql',
	'host' => 'localhost',
	'database' => 'basic',
	'username' => 'root',
	'password' => '',
	'charset' => 'utf8',
	'collation' => 'utf8_unicode_ci',
	'prefix' => '',
]);
 
//Y finalmente, iniciamos Eloquent
$capsule->bootEloquent();
```

### /public/index.php


```php
<?php
// Inicio de todas las clases
require "../vendor/autoload.php";
// Inicia la configuración de la base de datos
require "../config/database.php";
// Cargo los productos
$products = App\Entities\Product::get();
// Cargo la vista
include "../resources/views/list.php";
```

### /phpunit.xml

```xml
<?xml version="1.0" encoding="UTF-8"?>
<phpunit bootstrap="vendor/autoload.php"
        colors="true">
    <testsuites>
        <testsuite name="Application Test Suite">
            <directory suffix="Test.php">./tests</directory>
        </testsuite>
    </testsuites>
</phpunit>
```

Con esto indicamos entre otras cosas:
1. Que se registre en el autoload
2. Que los archivos de test están en la carpeta /tests
3. Que los archivos de test acaban en **Test.php**
4. Uso de colores en los resultados (Para médoto TDD, rojo, verde, refactor)


En Laravel, existen varias subcarpetas para diferenciar los tipos de pruebas (unitarias, funcionales ...)

## Puebas con PHPUNIT

Para ejecutar los archivos de pruebas, ejecutaremos desde la línea de comandos:
```
vendor/bin/phpunit
```

### Archivo /tests/ExampleTest

```php
<?php

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase {

    public function testTrue() {
        $this->assertTrue(true);
    }

    public function testFalse(){
        $var = false;
        $this->assertFalse($var);
    }

    public function testEquals() {
        $result = 5 + 5;
        $this->assertEquals($result, "10"); // ==
    }

    public function testSame() {
        // Compara tipos
        $result = 5 + 5;
        $this->assertSame($result, 10); // ===
    }

    public function testArray() {
        $this->assertIsArray([]);
    }
}
```


