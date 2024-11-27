<?php
namespace kosmoproyecto\app\repository;
use kosmoproyecto\app\entity\Evento;
use kosmoproyecto\app\entity\Categoria;
use kosmoproyecto\app\repository\CategoriasRepository;
use kosmoproyecto\core\database\QueryBuilder;

class EventosRepository extends QueryBuilder
{
    public function __construct(string $table = 'eventos', string $classEntity = Evento::class)
    {
        parent::__construct($table, $classEntity);
    }

    public function guarda(Evento $evento)
    {
        $fnGuardaImagen = function () use ($evento) { // Creamos una función anónima que se llama como callable
            $this->save($evento);
        };
        $this->executeTransaction($fnGuardaImagen); // Se pasa un callable
    }
}
