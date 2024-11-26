<?php

use kosmoproyecto\app\repository\UsuariosRepository;

Session_start();

use kosmoproyecto\core\App;
use kosmoproyecto\app\utils\MyLog;
use kosmoproyecto\core\Router;

require_once __DIR__ . '/../vendor/autoload.php';

$config = require_once __DIR__ . '/../app/config.php';
App::bind('config', $config); // Guardamos la configuración en el contenedor de servicios

$router = Router::load(__DIR__ . '/../app/' . $config['routes']['filename']);
App::bind('router', $router);

$logger = MyLog::load(__DIR__ . '/../logs/' . $config['logs']['filename'], $config['logs']['level']);
App::bind('logger', $logger); // Añadimos $logger al contenedor de servicios

if (isset($_SESSION['loguedUser'])) // Obtenemos el repositorio del usuario logueado y lo guardamos en el contenedor de servicios
    $appUser = App::getRepository(UsuariosRepository::class)->find($_SESSION['loguedUser']);
else
    $appUser = null;
App::bind('appUser', $appUser);
