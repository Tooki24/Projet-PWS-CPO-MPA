<?php

namespace App\Controller;

use App\Repository\CreneauRepository;
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
    public function planning(string $lg, CreneauRepository $creneauRepository): Response
    {
        $test = $creneauRepository->findAll();
        $tabDay = array();
        foreach ($test as $value)
        {
            array_push($tabDay, $value->getDay());
        }


        return $this->render('main/planning.html.twig', [
            'creneaux' => $creneauRepository->findByDay(),
            'lan' => $lg,
        ]);
    }
    #[Route('/espace-rdv/conseillers/{lg}', name: 'conseillers')]
    public function conseillers(string $lg): Response
    {
        return $this->render('main/conseillers.html.twig', [
            'controller_name' => 'MainController',
            'lan' => $lg,
        ]);
    }

}
