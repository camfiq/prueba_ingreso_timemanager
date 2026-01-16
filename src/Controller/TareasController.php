<?php

namespace App\Controller;

use App\Entity\Usuario;
use App\Services\TareaService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TareasController extends AbstractController
{
    #[Route('/tareas/usuario/{usuarioId}', name: 'tareas_usuario')]
    public function tareasPorUsuario(TareaService $tareaService, EntityManagerInterface $em, int $usuarioId): Response
    {
        $usuario = $em->getRepository(Usuario::class)->find($usuarioId);
        $tareas = $tareaService->obtenerTareasUsuario($em, $usuarioId);

        return $this->render('tareas/index.html.twig', [
            'tareas' => $tareas,
            'usuario' => $usuario,
        ]);
    }
}
