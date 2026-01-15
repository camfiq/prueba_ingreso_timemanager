<?php

namespace App\Entity;

use App\Repository\UsuariosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsuariosRepository::class)]
class Usuario
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nombre = null;

    #[ORM\Column(length: 50)]
    private ?string $apellido = null;

    #[ORM\Column(length: 200)]
    private ?string $email = null;

    /**
     * @var Collection<int, ProyectoUsuario>
     */
    #[ORM\OneToMany(targetEntity: ProyectoUsuario::class, mappedBy: 'usuario', orphanRemoval: true)]
    private Collection $proyectosAsignados;

    public function __construct()
    {
        $this->proyectosAsignados = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): static
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection<int, ProyectoUsuario>
     */
    public function getProyectosAsignados(): Collection
    {
        return $this->proyectosAsignados;
    }

    public function addProyectosAsignado(ProyectoUsuario $proyectosAsignado): static
    {
        if (!$this->proyectosAsignados->contains($proyectosAsignado)) {
            $this->proyectosAsignados->add($proyectosAsignado);
            $proyectosAsignado->setUsuario($this);
        }

        return $this;
    }

    public function removeProyectosAsignado(ProyectoUsuario $proyectosAsignado): static
    {
        if ($this->proyectosAsignados->removeElement($proyectosAsignado)) {
            // set the owning side to null (unless already changed)
            if ($proyectosAsignado->getUsuario() === $this) {
                $proyectosAsignado->setUsuario(null);
            }
        }

        return $this;
    }
}
