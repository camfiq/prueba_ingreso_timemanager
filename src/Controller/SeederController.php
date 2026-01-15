<?php

namespace App\Controller;

use App\Entity\Usuario;
use App\Entity\Proyecto;
use App\Entity\ProyectoUsuario;
use App\Entity\Tarea;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SeederController extends AbstractController
{
    #[Route('/seeder', name: 'app_seeder')]
    public function index(EntityManagerInterface $em): Response
    {
        // Usuarios
        $usuario = new Usuario();
        $usuario->setNombre('Camilo');
        $usuario->setApellido('Fique');
        $usuario->setEmail('camilo@test.com');

        $em->persist($usuario);


        $usuario2 = new Usuario();
        $usuario2->setNombre('Andres');
        $usuario2->setApellido('Fique');
        $usuario2->setEmail('andres@test.com');

        $em->persist($usuario2);

        // Proyectos
        $proyecto = new Proyecto();
        $proyecto->setNombre('Proyecto 1');

        $em->persist($proyecto);

        $proyecto2 = new Proyecto();
        $proyecto2->setNombre('Proyecto 2');

        $em->persist($proyecto2);

        // Tareas
        $tarea = new Tarea();
        $tarea->setNombre('Tarea de ejemplo 1');
        $tarea->setDescripcion('Tarea de ejemplo para el proyecto 1');
        $tarea->setProyecto($proyecto);

        $em->persist($tarea);

        $tarea2 = new Tarea();
        $tarea2->setNombre('Tarea de ejemplo 2');
        $tarea2->setDescripcion('Tarea de ejemplo para el proyecto 2');
        $tarea2->setProyecto($proyecto2);

        $em->persist($tarea2);

        //Vincular usuarios a proyectos con tarifas
        $proyectoUsuario1 = new ProyectoUsuario();
        $proyectoUsuario1->setUsuario($usuario);
        $proyectoUsuario1->setProyecto($proyecto);
        $proyectoUsuario1->setTarifa(25000);

        $em->persist($proyectoUsuario1);

        $proyectoUsuario2 = new ProyectoUsuario();
        $proyectoUsuario2->setUsuario($usuario2);
        $proyectoUsuario2->setProyecto($proyecto2);
        $proyectoUsuario2->setTarifa(30000);

        $em->persist($proyectoUsuario2);

        $em->flush();

        return new Response('Datos sembrados correctamente.');
    }
}
