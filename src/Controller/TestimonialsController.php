<?php

namespace App\Controller;

use App\Entity\Garages;
use App\Entity\Testimonials;
use App\Repository\TestimonialsRepository;
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
    public function index(TestimonialsRepository $testimonialsRepository): Response
    {
        $testimonials = $testimonialsRepository->findByValidated(1);

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
        $submittedToken = $request->request->get('token');

        if (!$this->isCsrfTokenValid('save_testimonial', $submittedToken)) {
            return new Response('Invalid CSRF token', Response::HTTP_FORBIDDEN);
        }

        if (!is_numeric($note) || $note < 1 || $note > 5) {
            return new Response('Invalid note value', Response::HTTP_BAD_REQUEST);
        }

        if (empty($author) || empty($message)) {
            return new Response('Author and message are required', Response::HTTP_BAD_REQUEST);
        }

        $garage = $this->entityManager->getRepository(Garages::class)->find($garageId);

        $testimonial = $this->createTestimonial($note, $author, $message, $garage);

        $this->entityManager->persist($testimonial);
        $this->entityManager->flush();


        return $this->redirectToRoute('avis');
    }


    private function createTestimonial(int $note, string $author, string $message, Garages $garage): Testimonials
    {
        $testimonial = new Testimonials;
        $testimonial
            ->setNote($note)
            ->setAuthor($author)
            ->setMessage($message)
            ->setGarage($garage);

        return $testimonial;
    }
}
