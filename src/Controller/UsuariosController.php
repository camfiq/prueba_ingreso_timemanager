<?php

namespace App\Controller;

use App\Entity\Usuario;
use App\Services\UsuarioService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

final class UsuariosController extends AbstractController
{
    #[Route('/usuarios', name: 'usuarios_listar')]
    public function listar(UsuarioService $usuarioService, EntityManagerInterface $em)
    {
        $usuarios = $usuarioService->listar($em);
        return $this->render('usuarios/index.html.twig', [
            'usuarios' => $usuarios,
        ]);
    }
}
