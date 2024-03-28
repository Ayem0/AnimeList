<?php

namespace App\Controller;

use App\Entity\Liste;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\Persistence\ManagerRegistry;

class ListController extends AbstractController
{
    #[Route('/list/{id}', name: 'app_list')]
    public function index(ManagerRegistry $doctrine, int $id): Response
    {
        $list = $doctrine->getRepository(Liste::class)->findOneBy(['id' => $id]);
        $animeInList = $list->getAnimeId();
        $listAnime = [];
        foreach ($animeInList as $element) {
            $listAnime[] = $element;
        };

        return $this->render('list/index.html.twig', [
            'controller_name' => 'ListController',
            'liste' => $list,
            'animeInList' => $listAnime
        ]);
    }
}
