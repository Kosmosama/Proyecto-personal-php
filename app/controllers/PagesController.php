<?php
namespace kosmoproyecto\app\controllers;

use kosmoproyecto\app\entity\Asociado;
use kosmoproyecto\app\entity\Evento;
use kosmoproyecto\app\entity\Imagen;
use kosmoproyecto\app\exceptions\ValidationException;
use kosmoproyecto\app\repository\AsociadosRepository;
use kosmoproyecto\app\repository\EventosRepository;
use kosmoproyecto\app\repository\ImagenesRepository;
use kosmoproyecto\app\utils\File;
use kosmoproyecto\core\App;
use kosmoproyecto\core\helpers\FlashMessage;
use kosmoproyecto\core\Response;

class PagesController
{
    public function index()
    {
        $eventos = App::getRepository(EventosRepository::class)->findAll();

        Response::renderView(
            'index',
            'layout',
            compact('eventos'),
        );
    }

    public function eventDetail($id)
    {
        $evento = App::getRepository(EventosRepository::class)->find($id);

        Response::renderView(
            'event-detail',
            'layout',
            compact('evento'),
        );
    }

    public function newEvent()
    {
        $errores = FlashMessage::get('new-event-error', []);
        $mensaje = FlashMessage::get('mensaje');
        Response::renderView(
            'new-event',
            'layout',
            compact('errores')
        );
    }

    public function addEvent()
    {
        try {
            if (!isset($_POST['nombre']) || empty($_POST['nombre']))
                throw new ValidationException('El titulo no puede estar vacio.');

            FlashMessage::set('nombre', $_POST['nombre']);

            if (!isset($_POST['description']) || empty($_POST['description']))
                throw new ValidationException('La descripcion no puede estar vacia.');

            FlashMessage::set('description', $_POST['description']);
            
            if (!isset($_POST['price']) || empty($_POST['price']))
            throw new ValidationException('El precio no puede estar vacio.');
            
            FlashMessage::set('price', $_POST['price']);

            $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];
            $image = new File('image', $tiposAceptados);

            $image->saveUploadFile(Evento::RUTA_IMAGENES_SUBIDAS);

            $evento = new Evento();
            $evento->setNombre($_POST['nombre']);
            $evento->setDescripcion($_POST['description']);
            $evento->setPrecio($_POST['price']);
            $evento->setImagen($image->getFileName());

            App::getRepository(EventosRepository::class)->save($evento);

            FlashMessage::unset('nombre');
            FlashMessage::unset('description');
            FlashMessage::unset('price');

            $message = "Se ha creado el usuario: " . $evento->getNombre();
            App::get('logger')->add($message);
            FlashMessage::set('message', $message);

            App::get('router')->redirect('');
        } catch (ValidationException $validationException) {
            FlashMessage::set('new-event-error', [$validationException->getMessage()]);
            App::get('router')->redirect('new-event');
        }
    }

    public function profile()
    {
        // No se si poner esto aqui o en authController
        // Hacer que se pueda cambiar la password, el usuario y la imagen
        Response::renderView(
            'profile',
            'layout'
        );
    }
}
