<?php

namespace App\Controller;

use App\Entity\Ads;
use App\Form\ContactFormType;
use Symfony\Component\Mime\Email;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdsController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/annonces', name: 'annonces')]
    public function index(): Response
    {
        $ads = $this->entityManager->getRepository(Ads::class)->findAll();


        return $this->render('ads/index.html.twig', [
            'ads' => $ads,
        ]);
    }


    #[Route('/annonces/{id}', name: 'details')]
    public function details(Ads $ad, Request $request, MailerInterface $mailer): Response
    {
        $ad = $this->entityManager->getRepository(Ads::class)->findOneById($ad->getId());

        $form = $this->createForm(ContactFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $email = (new Email())
                ->from($data['email'])
                ->to('contact@vparrot.fr')
                ->subject($data['subject'])
                ->text($data['message']);

            $mailer->send($email);

            $this->addFlash('success', 'Votre message a été envoyé avec succès !');
        } elseif ($form->isSubmitted()) {
            $this->addFlash('error', "Une erreur s'est produite. Veuillez réesayer.");
        }

        return $this->render('ads/details.html.twig', [
            'ad' => $ad,
            'form' => $form->createView()
        ]);
    }
}
