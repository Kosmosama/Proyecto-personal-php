<?php
namespace kosmoproyecto\app\repository;
use kosmoproyecto\app\entity\Categoria;
use kosmoproyecto\core\database\QueryBuilder;

class CategoriasRepository extends QueryBuilder
{
    public function __construct(string $table = 'categorias', string $classEntity = Categoria::class)
    {
        parent::__construct($table, $classEntity);
    }

    public function nuevaImagen(Categoria $categoria)
    {
        $categoria->setNumImagenes($categoria->getNumImagenes() + 1);
        $this->update($categoria);
    }
}
