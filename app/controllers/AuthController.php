<?php

namespace kosmoproyecto\app\controllers;

use kosmoproyecto\app\entity\Imagen;
use kosmoproyecto\app\entity\Usuario;
use kosmoproyecto\app\exceptions\FileException;
use kosmoproyecto\app\exceptions\ValidationException;
use kosmoproyecto\app\repository\AsociadosRepository;
use kosmoproyecto\app\repository\ImagenesRepository;
use kosmoproyecto\app\repository\UsuariosRepository;
use kosmoproyecto\app\utils\File;
use kosmoproyecto\core\App;
use kosmoproyecto\core\helpers\FlashMessage;
use kosmoproyecto\core\Response;
use kosmoproyecto\core\Security;

class AuthController
{
    public function login()
    {
        $errores = FlashMessage::get('login-error', []);
        $username = FlashMessage::get('username');
        Response::renderView(
            'login',
            'layout',
            compact('errores', 'username')
        );
    }

    public function logout()
    {
        if (isset($_SESSION['loguedUser'])) {
            $_SESSION['loguedUser'] = null;
            unset($_SESSION['loguedUser']);
        }
        App::get('router')->redirect('login');
    }

    public function checkLogin()
    {
        try {
            if (!isset($_POST['username']) || empty($_POST['username']))
                throw new ValidationException('Debes introducir el usuario y el password');
            FlashMessage::set('username', $_POST['username']);

            if (!isset($_POST['password']) || empty($_POST['password']))
                throw new ValidationException('Debes introducir el usuario y el password');

            $usuario = App::getRepository(UsuariosRepository::class)->findOneBy([
                'username' => $_POST['username']
            ]);
            if (!is_null($usuario) && Security::checkPassword($_POST['password'], $usuario->getPassword())) {
                // Guardamos el usuario en la sesión y redireccionamos a la página principal
                $_SESSION['loguedUser'] = $usuario->getId();
                FlashMessage::unset('username');
                App::get('router')->redirect('');
            }
            throw new ValidationException('El usuario y el password introducidos no existen');
        } catch (ValidationException $validationException) {
            FlashMessage::set('login-error', [$validationException->getMessage()]);
            App::get('router')->redirect('login'); // Redireccionamos al login
        }
    }

    public function register()
    {
        $errores = FlashMessage::get('register-error', []);
        $mensaje = FlashMessage::get('mensaje');
        $username = FlashMessage::get('username');
        Response::renderView(
            'register', 
            'layout', 
            compact('errores', 'username')
        );
    }

    public function checkRegister()
    {
        try {
            if (!isset($_POST['username']) || empty($_POST['username']))
                throw new ValidationException('El nombre de usuario no puede estar vacío');

            FlashMessage::set('username', $_POST['username']);

            if (!isset($_POST['password']) || empty($_POST['password']))
                throw new ValidationException('El password de usuario no puede estar vacío');

            if (!isset($_POST['repassword']) || empty($_POST['repassword']) || $_POST['password'] !== $_POST['repassword'])
                throw new ValidationException('Los dos password deben ser iguales');

            $password = Security::encrypt($_POST['password']);

            $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];
            $avatar = new File('avatar', $tiposAceptados);

            $avatar->saveUploadFile(Usuario::RUTA_IMAGENES_PERFIL);

            $usuario = new Usuario();
            $usuario->setUsername($_POST['username']);
            $usuario->setRole('ROLE_USER');
            $usuario->setPassword($password);
            $usuario->setImagen($avatar->getFileName());

            App::getRepository(UsuariosRepository::class)->save($usuario);

            FlashMessage::unset('username');
            $mensaje = "Se ha creado el usuario: " . $usuario->getUsername();
            App::get('logger')->add($mensaje);
            FlashMessage::set('mensaje', $mensaje);

            App::get('router')->redirect('login');
        } catch (ValidationException $validationException) {
            FlashMessage::set('register-error', [$validationException->getMessage()]);
            App::get('router')->redirect('register');
        }
    }
}
