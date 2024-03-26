<?php

namespace App\Controller;

use App\Form\CreateListFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MyListsController extends AbstractController
{
    #[Route('/my-lists', name: 'app_my_lists')]
    public function index(): Response
    {
        $user = $this->getUser();
        $form = $this->createForm(CreateListFormType::class);
        if ($user ) {
            $lists = $user->getListes();
        }

        return $this->render('my_lists/index.html.twig', [
            'controller_name' => 'MyListsController',
            'listes'=> $lists,
            'form'=>$form
        ]);
    }
}
