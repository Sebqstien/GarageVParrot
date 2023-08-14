<?php

namespace App\Controller;

use App\Entity\Ads;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdsController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/annonces', name: 'app_ads')]
    public function index(): Response
    {
        $ads = $this->entityManager->getRepository(Ads::class)->findAll();


        return $this->render('ads/index.html.twig', [
            'ads' => $ads,
        ]);
    }
}
