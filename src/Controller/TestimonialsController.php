<?php

namespace App\Controller;

use App\Entity\Testimonials;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestimonialsController extends AbstractController
{

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    #[Route('/avis', name: 'avis')]
    public function index(): Response
    {
        $testimonials = $this->entityManager->getRepository(Testimonials::class)->findbyValidated(1);
        return $this->render('testimonials/index.html.twig', [
            'avis' => $testimonials
        ]);
    }
}
