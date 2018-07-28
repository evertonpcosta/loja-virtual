<?php
// src/Controller/LojaController.php
namespace App\Controller;

use App\Entity\Carrinho;
use App\Entity\ItemCarrinho;
use App\Entity\Produto;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use \App\Entity\Categoria;

class LojaController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $user = $this->getUser();

        $repositoryProdutos = $this->getDoctrine()->getRepository(Produto::class);
        $produtos = $repositoryProdutos->findAll();

        $repositoryCategoria = $this->getDoctrine()->getRepository(Categoria::class);
        $categorias = $repositoryCategoria->findAll();

        return $this->render('loja/index.html.twig', array('produtos' => $produtos, 'categorias' => $categorias));
    }

    /**
     * @Route("/detalhes/{id}")
     */
    public function detalhesAction($id)
    {
        $user = $this->getUser();
        $repository = $this->getDoctrine()->getRepository(Produto::class);
        $produto = $repository->find($id);
        return $this->render('loja/detalhes.html.twig', array('produto' => $produto));
    }

    /**
     * @Route("/carrinho")
     */
    public function carrinhoAction()
    {
        $user = $this->getUser();
        $session = new Session();

        if (empty($session->get('carrinho'))) {
            exit('carrinho vazio');
        }
        $carrinho = $this->getDoctrine()
            ->getRepository(Carrinho::class)
            ->findOneBy(['id' => $session->get('carrinho'), 'status' => 1]);

        if (!$carrinho) {
            $session->remove('quantidadeItens');
            $session->remove('carrinho');
        }
        $itensCarrinho = $this->getDoctrine()
            ->getRepository(ItemCarrinho::class)
            ->findByCarrinho($carrinho);
        if (!$itensCarrinho) {
            $session->remove('quantidadeItens');
        }
        return $this->render('loja/carrinho.html.twig', array('itensCarrinho' => $itensCarrinho));

    }

    /**
     *  @Route("/carrinho/adicionar")
     */
    public function carrinhoAdicionarAction(Request $request)
    {
        $session = new Session();

        $produtoId = $request->get('produto');
        $quantidade = $request->get('quantidade');

        $repository = $this->getDoctrine()->getRepository(Produto::class);
        $produto = $repository->find($produtoId);

        $entityManager = $this->getDoctrine()->getManager();
        if (empty($session->get('carrinho'))) {

            $carrinho = new Carrinho();
            $carrinho->setStatus(1);
            $carrinho->setTotal(0);
            $entityManager->persist($carrinho);

            $itemCarrinho = new ItemCarrinho();
            $itemCarrinho->setCarrinho($carrinho);
            $itemCarrinho->setProduto($produto);
            $itemCarrinho->setQuantidade($quantidade);
            $itemCarrinho->setTotal($produto->getPreco() * $quantidade);
            $entityManager->persist($itemCarrinho);

            $entityManager->flush();

            $session->set('carrinho', $carrinho->getId());
            $session->set('quantidadeItens', 1);
            return $this->redirect('/carrinho');

        }

        $carrinho = $this->getDoctrine()
            ->getRepository(Carrinho::class)
            ->findOneBy(['id' => $session->get('carrinho'), 'status' => 1]);
        if ($carrinho) {
            $itemCarrinho = $this->getDoctrine()
                ->getRepository(ItemCarrinho::class)
                ->findOneBy(['carrinho' => $carrinho, 'produto' => $produto]);

            if ($itemCarrinho) {
                $itemCarrinho->setQuantidade($quantidade + $itemCarrinho->getQuantidade());
                $entityManager->flush();
            } else {
                $itemCarrinhoN = new ItemCarrinho();
                $itemCarrinhoN->setCarrinho($carrinho);
                $itemCarrinhoN->setProduto($produto);
                $itemCarrinhoN->setQuantidade($quantidade);
                $itemCarrinhoN->setTotal($produto->getPreco() * $quantidade);

                $entityManager->persist($itemCarrinhoN);

                $entityManager->flush();
            }

            $session->set('quantidadeItens', $session->get('quantidadeItens') + 1);
            return $this->redirect('/carrinho');
        } else {
            $session->remove('quantidadeItens');
            $session->remove('carrinho');
            return $this->redirect('/');
        }

    }

    /**
     *  @Route("/carrinho/remover/item/{id}")
     */
    public function carrinhoRemoverItemAction($id)
    {
        $session = new Session();
        $entityManager = $this->getDoctrine()->getManager();
        $itemCarrinho = $entityManager->getRepository(ItemCarrinho::class)->find($id);
        $entityManager->remove($itemCarrinho);
        $entityManager->flush();
        $session->set('quantidadeItens', $session->get('quantidadeItens') - 1);
        return $this->redirect('/carrinho');

    }

    /**
     *  @Route("/carrinho/atualizar/item/{id}/{adicionar}")
     */
    public function carrinhoAtualizarItemAction($id, $adicionar = false)
    {

        $entityManager = $this->getDoctrine()->getManager();

        $itemCarrinho = $entityManager->getRepository(ItemCarrinho::class)->find($id);
        $quantidade = $adicionar == false ? $itemCarrinho->getQuantidade() - 1 : $itemCarrinho->getQuantidade() + 1;
        if ($quantidade == 0) {
            return $this->redirect('/carrinho/remover/item/' . $id);
        }
        $itemCarrinho->setQuantidade($quantidade);
        $entityManager->flush();

        return $this->redirect('/carrinho');

    }

    /**
     *  @Route("/carrinho/finalizar")
     */
    public function carrinhoAFinalizarAction()
    {
        $user = $this->getUser();
        $session = new Session();

        if (empty($session->get('carrinho'))) {
            exit('carrinho vazio');
        }
        $entityManager = $this->getDoctrine()->getManager();
        $carrinho = $this->getDoctrine()
            ->getRepository(Carrinho::class)
            ->findOneBy(['id' => $session->get('carrinho'), 'status' => 1]);

        if (!$carrinho) {
            $session->remove('quantidadeItens');
            $session->remove('carrinho');
            return $this->redirect('/');
        }
        $carrinho->setStatus(2);
        $entityManager->flush();
        $session->remove('quantidadeItens');
        $session->remove('carrinho');
        return $this->render('loja/carrinhoFinalizar.html.twig', array('carro' => $carrinho));

    }

}
