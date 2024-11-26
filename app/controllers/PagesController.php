<?php
namespace kosmoproyecto\app\controllers;

use kosmoproyecto\app\entity\Asociado;
use kosmoproyecto\app\entity\Imagen;
use kosmoproyecto\app\repository\AsociadosRepository;
use kosmoproyecto\app\repository\ImagenesRepository;
use kosmoproyecto\core\App;
use kosmoproyecto\core\Response;

class PagesController
{
    public function index()
    {
        $asociados = [
            new Asociado("Asociado 1", "log1.jpg", "Descripción del asociado 1"),
            new Asociado("Asociado 2", "log2.jpg", "Descripción del asociado 2"),
            new Asociado("Asociado 3", "log3.jpg", "Descripción del asociado 3")
        ];

        $imagenesHome = App::getRepository(ImagenesRepository::class)->findAll();
        
        Response::renderView(
            'index',
            'layout',
            compact ( 'imagenesHome','asociados')
            );
    }
    public function about()
    {
        $imagenesClientes[] = new Imagen('client1.jpg', 'MISS BELLA');
        $imagenesClientes[] = new Imagen('client2.jpg', 'DON PENO');
        $imagenesClientes[] = new Imagen('client3.jpg', 'SWEETY');
        $imagenesClientes[] = new Imagen('client4.jpg', 'LADY');

        Response::renderView(
            'about',
            'layout',
            compact('imagenesClientes')
        );
    }
    public function blog()
    {
        Response::renderView(
            'blog',
            'layout'
            );
    }
    public function post()
    {
        Response::renderView(
            'single_post',
            'layout'
            );
    }
}
