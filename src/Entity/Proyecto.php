<?php

namespace App\Entity;

use App\Repository\ProyectosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProyectosRepository::class)]
class Proyecto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nombre = null;

    /**
     * @var Collection<int, ProyectoUsuario>
     */
    #[ORM\OneToMany(targetEntity: ProyectoUsuario::class, mappedBy: 'proyecto', orphanRemoval: true)]
    private Collection $UsuariosAsignados;

    /**
     * @var Collection<int, Tarea>
     */
    #[ORM\OneToMany(targetEntity: Tarea::class, mappedBy: 'Proyecto', orphanRemoval: true)]
    private Collection $TareasAsignadas;

    public function __construct()
    {
        $this->UsuariosAsignados = new ArrayCollection();
        $this->TareasAsignadas = new ArrayCollection();
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

    /**
     * @return Collection<int, ProyectoUsuario>
     */
    public function getUsuariosAsignados(): Collection
    {
        return $this->UsuariosAsignados;
    }

    public function addUsuariosAsignado(ProyectoUsuario $usuariosAsignado): static
    {
        if (!$this->UsuariosAsignados->contains($usuariosAsignado)) {
            $this->UsuariosAsignados->add($usuariosAsignado);
            $usuariosAsignado->setProyecto($this);
        }

        return $this;
    }

    public function removeUsuariosAsignado(ProyectoUsuario $usuariosAsignado): static
    {
        if ($this->UsuariosAsignados->removeElement($usuariosAsignado)) {
            // set the owning side to null (unless already changed)
            if ($usuariosAsignado->getProyecto() === $this) {
                $usuariosAsignado->setProyecto(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Tarea>
     */
    public function getTareasAsignadas(): Collection
    {
        return $this->TareasAsignadas;
    }

    public function addTareasAsignada(Tarea $tareasAsignada): static
    {
        if (!$this->TareasAsignadas->contains($tareasAsignada)) {
            $this->TareasAsignadas->add($tareasAsignada);
            $tareasAsignada->setProyecto($this);
        }

        return $this;
    }

    public function removeTareasAsignada(Tarea $tareasAsignada): static
    {
        if ($this->TareasAsignadas->removeElement($tareasAsignada)) {
            // set the owning side to null (unless already changed)
            if ($tareasAsignada->getProyecto() === $this) {
                $tareasAsignada->setProyecto(null);
            }
        }

        return $this;
    }
}
