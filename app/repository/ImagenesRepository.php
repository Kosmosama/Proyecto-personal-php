<?php
namespace kosmoproyecto\app\repository;
use kosmoproyecto\app\entity\Imagen;
use kosmoproyecto\app\entity\Categoria;
use kosmoproyecto\app\repository\CategoriasRepository;
use kosmoproyecto\core\database\QueryBuilder;

class ImagenesRepository extends QueryBuilder
{
    public function __construct(string $table = 'imagenes', string $classEntity = Imagen::class)
    {
        parent::__construct($table, $classEntity);
    }

    public function getCategoria(Imagen $imagenGaleria): Categoria
    {
        $categoriaRepository = new CategoriasRepository();
        return $categoriaRepository->find($imagenGaleria->getCategoria());
    }

    public function guarda(Imagen $imagenGaleria)
    {
        $fnGuardaImagen = function () use ($imagenGaleria) { // Creamos una función anónima que se llama como callable
            $categoria = $this->getCategoria($imagenGaleria);
            $categoriaRepository = new CategoriasRepository();
            $categoriaRepository->nuevaImagen($categoria);
            $this->save($imagenGaleria);
        };
        $this->executeTransaction($fnGuardaImagen); // Se pasa un callable
    }
}
