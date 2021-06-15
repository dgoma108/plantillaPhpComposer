<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
	'driver'    => 'mysql',
	'host'      => 'localhost',
    'port'      => '8889',
	'database'  => 'basic',
	'username'  => 'root',
	'password'  => 'root',
	'charset'   => 'utf8',
	'collation' => 'utf8_unicode_ci',
	'prefix'    => '',
]);
 
//Y finalmente, iniciamos Eloquent
$capsule->bootEloquent();