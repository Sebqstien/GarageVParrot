<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Entity\Ads;
use App\Form\ContactFormType;
use App\Form\SearchFormType;
use App\Repository\AdsRepository;
use App\Service\SendMailerService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;

class AdsController extends AbstractController
{


    #[Route('/annonces', name: 'annonces')]
    public function index(AdsRepository $adsRepository, Request $request): Response
    {

        $form = $this->createSearchForm($request);

        $ads = $adsRepository->findAll();



        return $this->render('ads/index.html.twig', [
            'ads' => $ads,
            'form' => $form->createView()
        ]);
    }


    #[Route('/annonces/filtres', name: 'filtres_annonces')]
    public function filteredAnnonces(AdsRepository $adsRepository, Request $request): Response
    {

        $form = $this->createSearchForm($request);

        $ads = $adsRepository->findSearch($form->getData());

        $html = $this->renderView('_partials/_annonces.html.twig', [
            'ads' => $ads
        ]);



        return $this->json([
            'html' => $html
        ]);
    }


    #[Route('/annonces/{id}', name: 'details')]
    public function details(Ads $ad, Request $request, SendMailerService $mail): Response
    {

        $form = $this->createForm(ContactFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();


            $mail->send(
                $data['email'],
                'contact@garage-vparrot.fr',
                $data['subject'],
                $data['message']
            );


            $this->addFlash('success', 'Votre message a été envoyé avec succès !');
        } elseif ($form->isSubmitted()) {
            $this->addFlash('error', "Une erreur s'est produite. Veuillez réesayer.");
        }

        return $this->render('ads/details.html.twig', [
            'ad' => $ad,
            'form' => $form->createView()
        ]);
    }

    private function createSearchForm(Request $request): FormInterface
    {
        $data = new SearchData;
        $form = $this->createForm(SearchFormType::class, $data);
        $form->handleRequest($request);
        return $form;
    }
}
