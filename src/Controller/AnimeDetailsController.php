<?php

namespace App\Controller;
use App\Entity\Anime;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AnimeDetailsController extends AbstractController
{
    #[Route('/anime/details/{id}', name: 'app_anime_details')]
    public function index(ManagerRegistry $doctrine, int $id): Response
    {
        $anime = $doctrine->getRepository(Anime::class)->findOneBy(['id' => $id]);
        $categories = $anime->getCategorie();
        $categoriesArray = [];
        foreach ($categories as $element) {
            $categoriesArray[] = $element;
        };
        return $this->render('anime_details/index.html.twig', [
            'anime' => $anime,
            'categories'=> $categoriesArray
        ]);
    }
}
