<?php
namespace kosmoproyecto\app\entity;
use kosmoproyecto\app\entity\IEntity;

class Evento implements IEntity
{
    private $id = null;
    private $nombre = "";
    private $descripcion = "";
    private $precio = 0.0;
    private $imagen = "";

    const RUTA_IMAGENES_SUBIDAS = '/public/images/imagenes_subidas/';

    public function __construct($nombre = "", $descripcion = "", $precio = 0.0, $imagen = "")
    {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->imagen = $imagen;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'nombre' => $this->getNombre(),
            'descripcion' => $this->getDescripcion(),
            'precio' => $this->getPrecio(),
            'imagen' => $this->imagen,
        ];
    }

    public function getId() { return $this->id; }
    public function getNombre() { return $this->nombre; }
    public function getDescripcion() { return $this->descripcion; }
    public function getPrecio() { return $this->precio; }
    public function getImagen() { return $this->imagen; }
    public function setNombre($nombre): Evento { $this->nombre = $nombre; return $this; }
    public function setDescripcion($descripcion): Evento { $this->descripcion = $descripcion; return $this; }
    public function setPrecio($precio): Evento { $this->precio = $precio; return $this; }
    public function setImagen($imagen): Evento { $this->imagen = $imagen; return $this; }

    public function getUrlSubidas() { return self::RUTA_IMAGENES_SUBIDAS . $this->getImagen(); }

    public function __toString()
    {
        return $this->descripcion;
    }
}
