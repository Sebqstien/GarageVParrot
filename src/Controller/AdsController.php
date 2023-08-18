<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Entity\Ads;
use App\Form\ContactFormType;
use App\Form\SearchFormType;
use App\Repository\AdsRepository;
use Symfony\Component\Mime\Email;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class AdsController extends AbstractController
{


    #[Route('/annonces', name: 'annonces')]
    public function index(AdsRepository $adsRepository, Request $request): Response
    {

        $data = new SearchData;
        $form = $this->createForm(SearchFormType::class, $data);
        $form->handleRequest($request);

        $ads = $adsRepository->findSearch($data);



        return $this->render('ads/index.html.twig', [
            'ads' => $ads,
            'form' => $form->createView()
        ]);
    }


    #[Route('/annonces/{id}', name: 'details')]
    public function details(Ads $ad, Request $request, MailerInterface $mailer): Response
    {

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
