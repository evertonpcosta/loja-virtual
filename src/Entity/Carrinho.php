<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CarrinhoRepository")
 */
class Carrinho
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="carrinhos")
     */
    private $user;

    /**
     * @ORM\Column(type="integer")
     */
    private $status;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $total;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ItemCarrinho", mappedBy="carrinho")
     */
    private $itemCarrinhos;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Endereco", inversedBy="carrinhos")
     */
    private $endereco;

    public function __construct()
    {
        $this->itemCarrinhos = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
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

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setTotal($total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getEndereco(): ?Endereco
    {
        return $this->endereco;
    }

    public function setEndereco(?Endereco $endereco): self
    {
        $this->endereco = $endereco;

        return $this;
    }
}
