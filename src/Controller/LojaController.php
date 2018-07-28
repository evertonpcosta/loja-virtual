<?php
// src/Controller/LojaController.php
namespace App\Controller;

use App\Entity\Produto;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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

        return $this->render('loja/index.html.twig', array('user' => $user, 'produtos' => $produtos, 'categorias' => $categorias));
    }

    /**
     * @Route("/detalhes/{id}")
     */
    public function detalhesAction($id)
    {
        $user = $this->getUser();
        $repository = $this->getDoctrine()->getRepository(Produto::class);
        $produto = $repository->find($id);
        return $this->render('loja/detalhes.html.twig', array('user' => $user, 'produto' => $produto));
    }

}
