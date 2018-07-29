<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EnderecoRepository")
 */
class Endereco
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=255)
     */
    private $rua;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=255)
     */
    private $numero;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=255)
     */
    private $complemento;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=255)
     */
    private $bairro;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=255)
     */
    private $cidade;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=255)
     */
    private $estado;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="enderecos")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Carrinho", mappedBy="endereco")
     */
    private $carrinhos;

    public function __construct()
    {
        $this->carrinhos = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getRua(): ?string
    {
        return $this->rua;
    }

    public function setRua(string $rua): self
    {
        $this->rua = $rua;

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getComplemento(): ?string
    {
        return $this->complemento;
    }

    public function setComplemento(string $complemento): self
    {
        $this->complemento = $complemento;

        return $this;
    }

    public function getBairro(): ?string
    {
        return $this->bairro;
    }

    public function setBairro(string $bairro): self
    {
        $this->bairro = $bairro;

        return $this;
    }

    public function getCidade(): ?string
    {
        return $this->cidade;
    }

    public function setCidade(string $cidade): self
    {
        $this->cidade = $cidade;

        return $this;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Carrinho[]
     */
    public function getCarrinhos(): Collection
    {
        return $this->carrinhos;
    }

    public function addCarrinho(Carrinho $carrinho): self
    {
        if (!$this->carrinhos->contains($carrinho)) {
            $this->carrinhos[] = $carrinho;
            $carrinho->setEndereco($this);
        }

        return $this;
    }

    public function removeCarrinho(Carrinho $carrinho): self
    {
        if ($this->carrinhos->contains($carrinho)) {
            $this->carrinhos->removeElement($carrinho);
            // set the owning side to null (unless already changed)
            if ($carrinho->getEndereco() === $this) {
                $carrinho->setEndereco(null);
            }
        }

        return $this;
    }
}
