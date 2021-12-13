<?php

namespace App\Controller;

use App\Repository\ConseillierRepository;
use App\Repository\CreneauRepository;
use App\Repository\LangueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;

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

        return $this->render('main/planning.html.twig', [
            'creneaux' => $creneauRepository->findByDay(),
            'lan' => $lg,
        ]);
    }
    #[Route('/espace-rdv/planningHeure/{lg}/{date}', name: 'planningHeure')]
    public function planningHeure(string $lg, string $date, CreneauRepository $creneauRepository): Response
    {
        return $this->render('main/planningHeure.html.twig', [
            'lan' => $lg,
            'date' => $date,
            'creneauxH' => $creneauRepository->findBy(["day" => new \DateTime($date)])
        ]);
    }
    #[Route('/espace-rdv/conseillers/{lg}/{rdv}', name: 'conseillers')]
    public function conseillers(string $lg, int $rdv): Response
    {
        return $this->render('main/conseillers.html.twig', [
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
