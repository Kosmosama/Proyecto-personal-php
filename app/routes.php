<?php
$router->get ('', 'PagesController@index');
$router->get ('post', 'PagesController@post');

$router->get('new-event', 'PagesController@newEvent'); // , 'ROLE_ADMIN'
$router->post('add-event', 'PagesController@addEvent'); // , 'ROLE_ADMIN'

$router->get ('event/:id', 'PagesController@eventDetail'); // , 'ROLE_USER'

$router->get ('profile', 'PagesController@profile'); // , 'ROLE_USER'

$router->get ('login', 'AuthController@login');
$router->get ('logout', 'AuthController@logout');
$router->post('check-login', 'AuthController@checkLogin');
$router->get ('register', 'AuthController@register');
$router->post('check-register', 'AuthController@checkRegister');