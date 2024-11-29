<?php

use kosmoproyecto\app\exceptions\AppException;
use kosmoproyecto\app\exceptions\NotFoundException;
use kosmoproyecto\core\App;
use kosmoproyecto\core\Request;

try {
    require_once 'core/Bootstrap.php';
    App::get('router')->direct(Request::uri(), Request::method());
} catch (NotFoundException $notFoundException) {
    (new AppException('Página no encontrada', 404))->handleError();
}
