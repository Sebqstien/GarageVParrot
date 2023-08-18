<?php

namespace App\Controller;


use App\Repository\ServicesRepository;
use App\Repository\TestimonialsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{

    #[Route('/', name: 'accueil')]
    public function index(ServicesRepository $servicesRepository, TestimonialsRepository $testimonialsRepository): Response
    {
        $services = $servicesRepository->findAll();
        $testimonials = $testimonialsRepository->findByValidated(1);
        return $this->render('main/index.html.twig', [
            'services' => $services,
            'avis' => $testimonials
        ]);
    }
}
