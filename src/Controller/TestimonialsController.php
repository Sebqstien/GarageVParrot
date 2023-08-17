<?php

namespace App\Controller;

use App\Entity\Garages;
use App\Entity\Testimonials;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function index(Request $request): Response
    {
        $testimonials = $this->entityManager->getRepository(Testimonials::class)->findbyValidated(1);

        return $this->render('testimonials/index.html.twig', [
            'avis' => $testimonials,
        ]);
    }


    #[Route('/avis/save', name: 'testimonials_save', methods: ['POST'])]
    public function saveTestimonial(Request $request): Response
    {
        $note = $request->request->get('note');
        $author = $request->request->get('author');
        $message = $request->request->get('message');
        $garageId = $request->request->get('garage_id');


        $garage = $this->entityManager->getRepository(Garages::class)->find($garageId);


        $testimonial = new Testimonials;
        $testimonial
            ->setNote($note)
            ->setAuthor($author)
            ->setMessage($message)
            ->setGarage($garage);

        $this->entityManager->persist($testimonial);
        $this->entityManager->flush();

        return $this->redirectToRoute('avis');
    }
}
