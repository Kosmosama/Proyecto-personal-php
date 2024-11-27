<?php
namespace kosmoproyecto\app\controllers;

use kosmoproyecto\app\entity\Evento;
use kosmoproyecto\app\entity\Usuario;
use kosmoproyecto\app\exceptions\AppException;
use kosmoproyecto\app\exceptions\FileException;
use kosmoproyecto\app\exceptions\NotFoundException;
use kosmoproyecto\app\exceptions\ValidationException;
use kosmoproyecto\app\repository\EventosRepository;
use kosmoproyecto\app\repository\UsuariosRepository;
use kosmoproyecto\app\utils\File;
use kosmoproyecto\core\App;
use kosmoproyecto\core\helpers\FlashMessage;
use kosmoproyecto\core\Response;
use kosmoproyecto\core\Security;

class PagesController
{
    public function index()
    {
        $order = $_GET['order'] ?? null;
        $search = $_GET['search'] ?? null;

        $repository = App::getRepository(EventosRepository::class);

        if ($search) {
            $eventos = $repository->searchByName($search);
        } else {
            $eventos = $repository->findAll();
        }

        if ($order === 'alphabetical') {
            usort($eventos, fn($a, $b) => strcmp($a->getNombre(), $b->getNombre()));
        } elseif ($order === 'price') {
            usort($eventos, fn($a, $b) => $a->getPrecio() <=> $b->getPrecio());
        }

        Response::renderView(
            'index',
            'layout',
            compact('eventos', 'order', 'search'),
        );
    }

    public function eventDetail($id)
    {
        try {
            $evento = App::getRepository(EventosRepository::class)->find($id);

            Response::renderView(
                'event-detail',
                'layout',
                compact('evento'),
            );
        } catch (NotFoundException $notFoundException) {
            throw new AppException("Evento no encontrado: " . $notFoundException->getMessage(), 404);
        } catch ( AppException $appException ) {
            $appException->handleError();
        }
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

            App::get('router')->redirect('/?order=alphabetical');
        } catch (ValidationException $validationException) {
            FlashMessage::set('new-event-error', [$validationException->getMessage()]);
            App::get('router')->redirect('new-event');
        }
    }

    public function profile()
    {
        $errores = FlashMessage::get('update-error', []);
        $mensaje = FlashMessage::get('mensaje');
        Response::renderView(
            'profile',
            'layout',
            compact('errores'),
        );
    }

    public function updateUsername()
    {
        try {
            $usuarioId = $_SESSION['loguedUser'];

            $nuevoUsername = $_POST['username'] ?? null;
            if (empty($nuevoUsername)) {
                throw new ValidationException('El nombre de usuario no puede estar vacío.');
            }

            $usuarioRepo = App::getRepository(UsuariosRepository::class);
            $usuario = $usuarioRepo->getUsuarioPorId($usuarioId);

            $nombreAnterior = $usuario->getUsername();

            $usuarioExistente = $usuarioRepo->findOneBy(['username' => $nuevoUsername]);
            if ($usuarioExistente !== null) {
                throw new ValidationException('El nombre de usuario ya está en uso.');
            }

            $usuario->setUsername($nuevoUsername);
            $usuarioRepo->update($usuario);

            $_SESSION['loguedUser'] = $usuario->getId();

            $message = "Se ha actualizado el nombre de usuario: " . $nombreAnterior . " -> " . $nuevoUsername;
            App::get('logger')->add($message);

            App::get('router')->redirect('profile');
        } catch (ValidationException $validationException) {
            FlashMessage::set('update-error', [$validationException->getMessage()]);
            App::get('router')->redirect('profile?view=editProfile');
        }
    }

    public function updatePassword()
    {
        try {
            $usuarioId = $_SESSION['loguedUser'];

            $nuevaPassword = $_POST['password'] ?? null;
            $repetirPassword = $_POST['password2'] ?? null;

            if (empty($nuevaPassword) || empty($repetirPassword)) {
                throw new ValidationException('Las contraseñas no pueden estar vacías.');
            }

            if ($nuevaPassword !== $repetirPassword) {
                throw new ValidationException('Las contraseñas no coinciden.');
            }

            $usuarioRepo = App::getRepository(UsuariosRepository::class);
            $usuario = $usuarioRepo->getUsuarioPorId($usuarioId);

            $usuario->setPassword(Security::encrypt($nuevaPassword));
            $usuarioRepo->update($usuario);

            $message = "Se ha actualizado la contraseña del usuario: " . $usuario->getUsername();
            App::get('logger')->add($message);

            App::get('router')->redirect('profile');
        } catch (ValidationException $validationException) {
            FlashMessage::set('update-error', [$validationException->getMessage()]);
            App::get('router')->redirect('profile?view=editPassword');
        }
    }

    public function updateImage()
    {
        try {
            $usuarioId = $_SESSION['loguedUser'];
            $usuarioRepo = App::getRepository(UsuariosRepository::class);
            $usuario = $usuarioRepo->getUsuarioPorId($usuarioId);

            $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];
            $nuevaImagen = new File('avatar', $tiposAceptados);

            $nuevaImagen->saveUploadFile(Usuario::RUTA_IMAGENES_PERFIL);

            $rutaImagenAnterior = $_SERVER['DOCUMENT_ROOT'] . '/' . Usuario::RUTA_IMAGENES_PERFIL . $usuario->getImagen();
            if (is_file($rutaImagenAnterior)) {
                unlink($rutaImagenAnterior);
            }

            $usuario->setImagen($nuevaImagen->getFileName());
            $usuarioRepo->update($usuario);

            $message = "Se ha actualizado la contraseña del usuario: " . $usuario->getUsername();
            App::get('logger')->add($message);
            
            App::get('router')->redirect('profile');
        } catch (FileException $fileException) {
            FlashMessage::set('update-error', [$fileException->getMessage()]);
            App::get('router')->redirect('profile?view=editProfile');
        } catch (ValidationException $validationException) {
            FlashMessage::set('update-error', [$validationException->getMessage()]);
            App::get('router')->redirect('profile?view=editProfile');
        }
    }
}
