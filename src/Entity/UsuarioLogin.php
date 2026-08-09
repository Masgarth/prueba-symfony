<?php

namespace App\Entity;

use App\Repository\UsuarioLoginRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UsuarioLoginRepository::class)]
class UsuarioLogin implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'IDuser')]
    private ?int $IDuser = null;

    #[ORM\Column(length: 100)]
    private ?string $Usuario = null;

    #[ORM\Column(length: 255)]
    private ?string $Password = null;

    #[ORM\Column]
    private ?int $NivelAcceso = null;

    #[ORM\Column(length: 150)]
    private ?string $Nombre = null;

    #[ORM\Column(length: 150)]
    private ?string $Cargo = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $Interno = null;

    #[ORM\Column(length: 180, nullable: true)]
    private ?string $Correo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Imagen = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $Fecha = null;

    #[ORM\Column]
    private ?bool $Estado = true;

    #[ORM\Column]
    private ?bool $Habilitado = true;


    public function getIDuser(): ?int
    {
        return $this->IDuser;
    }

    public function getUsuario(): ?string
    {
        return $this->Usuario;
    }

    public function setUsuario(string $Usuario): static
    {
        $this->Usuario = $Usuario;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->Password;
    }

    public function setPassword(string $Password): static
    {
        $this->Password = $Password;

        return $this;
    }

    public function getNivelAcceso(): ?int
    {
        return $this->NivelAcceso;
    }

    public function setNivelAcceso(int $NivelAcceso): static
    {
        $this->NivelAcceso = $NivelAcceso;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->Nombre;
    }

    public function setNombre(string $Nombre): static
    {
        $this->Nombre = $Nombre;

        return $this;
    }

    public function getCargo(): ?string
    {
        return $this->Cargo;
    }

    public function setCargo(string $Cargo): static
    {
        $this->Cargo = $Cargo;

        return $this;
    }

    public function getInterno(): ?string
    {
        return $this->Interno;
    }

    public function setInterno(?string $Interno): static
    {
        $this->Interno = $Interno;

        return $this;
    }

    public function getCorreo(): ?string
    {
        return $this->Correo;
    }

    public function setCorreo(?string $Correo): static
    {
        $this->Correo = $Correo;

        return $this;
    }

    public function getImagen(): ?string
    {
        return $this->Imagen;
    }

    public function setImagen(?string $Imagen): static
    {
        $this->Imagen = $Imagen;

        return $this;
    }

    public function getFecha(): ?\DateTimeImmutable
    {
        return $this->Fecha;
    }

    public function setFecha(\DateTimeImmutable $Fecha): static
    {
        $this->Fecha = $Fecha;

        return $this;
    }

    public function isEstado(): ?bool
    {
        return $this->Estado;
    }

    public function setEstado(bool $Estado): static
    {
        $this->Estado = $Estado;

        return $this;
    }

    public function isHabilitado(): ?bool
    {
        return $this->Habilitado;
    }

    public function setHabilitado(bool $Habilitado): static
    {
        $this->Habilitado = $Habilitado;

        return $this;
    }

    public function getUserIdentifier(): string
    {
        return $this->Usuario;
    }

    public function getRoles(): array
    {
        return ['ROLE_USER'];
    }

    public function eraseCredentials(): void
    {
    }
}