<?php

namespace App\Controller;

use App\Repository\LangueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/espace-rdv', name: 'index')]
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
    #[Route('/espace-rdv/langue', name: 'langue')]
    public function langue(LangueRepository $langueRepository): Response
    {
        return $this->render('main/langue.html.twig', [
            'langues' => $langueRepository->findAll()
        ]);
    }
    #[Route('/espace-rdv/planning/{lg}', name: 'planning')]
    public function planning(string $lg,): Response
    {
        return $this->render('main/planning.html.twig', [
            'controller_name' => 'MainController',
            'lan' => $lg,
        ]);
    }
        #[Route('/espace-rdv/choixConseiller/{lg}', name: 'choixConseiller')]
    public function choixConseiller(string $lg,): Response
    {
        return $this->render('main/choixConseiller.html.twig', [
            'controller_name' => 'MainController',
            'lan' => $lg,
        ]);
    }

}
