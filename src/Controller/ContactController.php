<?php

namespace App\Controller;

use App\Form\ContactFormType;
use App\Service\SendMailerService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function index(Request $request, SendMailerService $mail): Response
    {
        $form = $this->createForm(ContactFormType::class);

        $contact = $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $mail->send(
                $contact->get('email')->getData(),
                'contact@garage-vparrot.fr',
                $contact->get('subject')->getData(),
                $contact->get('message')->getData(),
            );

            $this->addFlash('success', 'Votre message a été envoyé avec succès !');
        } elseif ($form->isSubmitted()) {
            $this->addFlash('error', "Une erreur s'est produite. Veuillez réesayer.");
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
