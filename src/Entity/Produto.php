<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProdutoRepository")
 */
class Produto
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nome;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descricao;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imagem;

    /**
     * @ORM\Column(type="decimal", precision=7, scale=2)
     */
    private $preco;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ProdutoCategoria", mappedBy="produto")
     */
    private $produtoCategorias;

    public function __construct()
    {
        $this->produtoCategorias = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): self
    {
        $this->descricao = $descricao;

        return $this;
    }

    public function getImagem(): ?string
    {
        return $this->imagem;
    }

    public function setImagem(string $imagem): self
    {
        $this->imagem = $imagem;

        return $this;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function setPreco($preco): self
    {
        $this->preco = $preco;

        return $this;
    }

    /**
     * @return Collection|ProdutoCategoria[]
     */
    public function getProdutoCategorias(): Collection
    {
        return $this->produtoCategorias;
    }

    public function addProdutoCategoria(ProdutoCategoria $produtoCategoria): self
    {
        if (!$this->produtoCategorias->contains($produtoCategoria)) {
            $this->produtoCategorias[] = $produtoCategoria;
            $produtoCategoria->setProduto($this);
        }

        return $this;
    }

    public function removeProdutoCategoria(ProdutoCategoria $produtoCategoria): self
    {
        if ($this->produtoCategorias->contains($produtoCategoria)) {
            $this->produtoCategorias->removeElement($produtoCategoria);
            // set the owning side to null (unless already changed)
            if ($produtoCategoria->getProduto() === $this) {
                $produtoCategoria->setProduto(null);
            }
        }

        return $this;
    }
}
