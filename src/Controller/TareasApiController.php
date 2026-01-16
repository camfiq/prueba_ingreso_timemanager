<?php

namespace App\Controller;

use App\Services\TareaService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

final class TareasApiController extends AbstractController
{
    #[Route('/api/tareas/usuario/{usuarioId}', name: 'api_tareas_usuario', methods: ['GET'])]
    public function listar(TareaService $tareaService, EntityManagerInterface $em, int $usuarioId)
    {
        $tareas = $tareaService->obtenerTareasUsuario($em, $usuarioId);
        return $this->json($tareas);
    }
}
