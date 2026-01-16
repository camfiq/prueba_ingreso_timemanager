<?php

namespace App\Controller;

use App\Services\UsuarioService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

final class UsuariosApiController extends AbstractController
{
    #[Route('/api/usuarios/listar', name: 'api_usuarios_listar', methods: ['GET'])]
    public function listar(UsuarioService $usuarioService, EntityManagerInterface $em)
    {
        $usuarios = $usuarioService->listar($em);
        return $this->json($usuarios, 200, [], ['groups' => 'usuarios:listar']);
    }
}
