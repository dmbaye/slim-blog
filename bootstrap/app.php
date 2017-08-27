<?php

ini_set('display_errors', 'On');

session_start();

use Blog\App;
use Illuminate\Database\Capsule\Manager as Capsule;

require __DIR__ . '/../vendor/autoload.php';

$app = new App;

$capsule = new Capsule;
$capsule->addConnection([
  'driver'    => 'mysql',
  'host'      => 'localhost',
  'database'  => 'blog',
  'username'  => 'root',
  'password'  => 'koopa',
  'charset'   => 'utf8',
  'collation' => 'utf8_unicode_ci',
  'prefix'    => '',
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();

require __DIR__ . '/../config/routes.php';