<?php

namespace App\Services;

use App\Entity\Usuario;
use Doctrine\ORM\EntityManagerInterface;

class UsuarioService
{

    public function listar(EntityManagerInterface $em)
    {
        $usuarios = $em->getRepository(Usuario::class)->findAll();
        return $usuarios;
    }
}
