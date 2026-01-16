<?php

namespace App\Services;

use App\Entity\Tarea;
use Doctrine\ORM\EntityManagerInterface;

class TareaService
{

    public function obtenerTareasUsuario(EntityManagerInterface $em, int $usuarioId)
    {
        $usuarios = $em->getRepository(Tarea::class)->obtenerTareasPorUsuario($usuarioId);
        return $usuarios;
    }
}
