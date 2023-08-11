<?php

namespace App\Controller;

use App\Entity\Services;
use App\Entity\Testimonials;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'app_main')]
    public function index(): Response
    {
        $services = $this->entityManager->getRepository(Services::class)->findAll();
        $testimonials = $this->entityManager->getRepository(Testimonials::class)->findByValidated(1);
        return $this->render('main/index.html.twig', [
            'services' => $services,
            'avis' => $testimonials
        ]);
    }
}
