<?php
$router->get('', 'PagesController@index');
$router->get('post', 'PagesController@post');

$router->get('new-event', 'PagesController@newEvent'); // , 'ROLE_ADMIN'
$router->post('add-event', 'PagesController@addEvent'); // , 'ROLE_ADMIN'

// #TODO place inside event/
$router->get(':id', 'PagesController@eventDetail'); // , 'ROLE_USER'

$router->get('profile', 'PagesController@profile'); // , 'ROLE_USER'
// #TODO place inside profile/
$router->post('update-username', 'PagesController@updateUsername'); // , 'ROLE_USER'
$router->post('update-password', 'PagesController@updatePassword'); // , 'ROLE_USER'
$router->post('update-image', 'PagesController@updateImage'); // , 'ROLE_USER'

$router->get('login', 'AuthController@login');
$router->get('logout', 'AuthController@logout');
$router->post('check-login', 'AuthController@checkLogin');
$router->get('register', 'AuthController@register');
$router->post('check-register', 'AuthController@checkRegister');