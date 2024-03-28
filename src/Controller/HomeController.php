<?php

namespace App\Controller;
use App\Entity\Anime;
use App\Form\SearchBarFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Request $request): Response
    {
        $anime = new Anime();
        $form = $this->createForm(SearchBarFormType::class, $anime);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
        }

        return $this->render('home/index.html.twig', [
            'searchForm' => $form,
        ]);
    }
}
