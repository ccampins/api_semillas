<?php

namespace App\Entity;

use App\Repository\SemillasRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SemillasRepository::class)
 */
class Semillas
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=3, nullable=true)
     */
    private $codigo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $especie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $origen;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $proveedor;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $banco_de_semillas;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $limite_minimo_thc;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $limite_maximo_thc;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $limite_minimo_cbd;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $limite_maximo_cbd;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(?string $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getEspecie(): ?string
    {
        return $this->especie;
    }

    public function setEspecie(string $especie): self
    {
        $this->especie = $especie;

        return $this;
    }

    public function getOrigen(): ?string
    {
        return $this->origen;
    }

    public function setOrigen(string $origen): self
    {
        $this->origen = $origen;

        return $this;
    }

    public function getProveedor(): ?string
    {
        return $this->proveedor;
    }

    public function setProveedor(?string $proveedor): self
    {
        $this->proveedor = $proveedor;

        return $this;
    }

    public function getBancoDeSemillas(): ?string
    {
        return $this->banco_de_semillas;
    }

    public function setBancoDeSemillas(?string $banco_de_semillas): self
    {
        $this->banco_de_semillas = $banco_de_semillas;

        return $this;
    }

    public function getLimiteMinimoThc(): ?float
    {
        return $this->limite_minimo_thc;
    }

    public function setLimiteMinimoThc(?float $limite_minimo_thc): self
    {
        $this->limite_minimo_thc = $limite_minimo_thc;

        return $this;
    }

    public function getLimiteMaximoThc(): ?float
    {
        return $this->limite_maximo_thc;
    }

    public function setLimiteMaximoThc(?float $limite_maximo_thc): self
    {
        $this->limite_maximo_thc = $limite_maximo_thc;

        return $this;
    }

    public function getLimiteMinimoCbd(): ?float
    {
        return $this->limite_minimo_cbd;
    }

    public function setLimiteMinimoCbd(?float $limite_minimo_cbd): self
    {
        $this->limite_minimo_cbd = $limite_minimo_cbd;

        return $this;
    }

    public function getLimiteMaximoCbd(): ?float
    {
        return $this->limite_maximo_cbd;
    }

    public function setLimiteMaximoCbd(?float $limite_maximo_cbd): self
    {
        $this->limite_maximo_cbd = $limite_maximo_cbd;

        return $this;
    }
}
