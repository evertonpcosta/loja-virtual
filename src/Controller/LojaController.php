<?php
// src/Controller/LojaController.php
namespace App\Controller;

use App\Entity\Produto;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LojaController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository(Produto::class);
        $produtos = $repository->findAll();

        return $this->render('loja/index.html.twig', array('produtos' => $produtos));
    }

    /**
     * @Route("/detalhes/{id}")
     */
    public function detalhesAction($id)
    {
        $repository = $this->getDoctrine()->getRepository(Produto::class);
        $produto = $repository->find($id);
        return $this->render('loja/detalhes.html.twig', array('produto' => $produto));
    }

}
