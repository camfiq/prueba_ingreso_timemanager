<?php

namespace App\Entity;

use App\Repository\ProyectoUsuarioRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProyectoUsuarioRepository::class)]
class ProyectoUsuario
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $tarifa = null;

    #[ORM\ManyToOne(inversedBy: 'proyectosAsignados')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Usuario $usuario = null;

    #[ORM\ManyToOne(inversedBy: 'UsuariosAsignados')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Proyecto $proyecto = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTarifa(): ?float
    {
        return $this->tarifa;
    }

    public function setTarifa(float $tarifa): static
    {
        $this->tarifa = $tarifa;

        return $this;
    }

    public function getUsuario(): ?Usuario
    {
        return $this->usuario;
    }

    public function setUsuario(?Usuario $usuario): static
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getProyecto(): ?Proyecto
    {
        return $this->proyecto;
    }

    public function setProyecto(?Proyecto $proyecto): static
    {
        $this->proyecto = $proyecto;

        return $this;
    }
}
