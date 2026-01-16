<?php

namespace App\Repository;

use App\Entity\Tarea;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Tarea>
 */
class TareaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tarea::class);
    }

    public function obtenerTareasPorUsuario(int $usuarioId): array
    {
        return $this->createQueryBuilder('t')
            ->select(
                't.id AS tarea_id',
                't.nombre AS tarea_nombre',
                'p.nombre AS proyecto_nombre',
                'pu.tarifa AS tarifa',
            )
            ->join('t.proyecto', 'p')
            ->join('p.UsuariosAsignados', 'pu')
            ->join('pu.usuario', 'u')
            ->where('u.id = :usuarioId')
            ->setParameter('usuarioId', $usuarioId)
            ->getQuery()
            ->getArrayResult();
    }
}
