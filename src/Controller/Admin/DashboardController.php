<?php

namespace App\Controller\Admin;

use App\Entity\Ads;
use App\Entity\Cars;
use App\Entity\Garages;
use App\Entity\Images;
use App\Entity\Schedules;
use App\Entity\Services;
use App\Entity\Testimonials;
use App\Entity\Users;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

class DashboardController extends AbstractDashboardController
{

    public function __construct(private AdminUrlGenerator $adminUrlGenerator)
    {
    }


    #[Route('/dashboard', name: 'dashboard')]
    public function index(): Response
    {

        $this->adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);

        return $this->redirect($this->adminUrlGenerator->setController(AdsCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Administration')
            ->setFaviconPath('/assets/img/Logo.webp')
            ->renderContentMaximized();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToUrl('Accueil', 'fa fa-home', '/');
        yield MenuItem::section('Annonces');
        yield MenuItem::linkToCrud('Gérer les annonces', 'fa-solid fa-pen', Ads::class);
        yield MenuItem::linkToCrud('Gérer les voitures', 'fa-solid fa-car', Cars::class);
        yield MenuItem::linkToCrud('Gérer les images', 'fa-solid fa-image', Images::class);
        yield MenuItem::section('Avis clients');
        yield MenuItem::linkToCrud('Gérer les avis clients', 'fa-solid fa-star', Testimonials::class);
        if ($this->isGranted('ROLE_ADMIN')) {
            yield MenuItem::section('Section Admin');
            yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-user', Users::class);
            yield MenuItem::linkToCrud('Gérer les horaires', 'fas fa-clock', Schedules::class);
            yield MenuItem::linkToCrud('Gérer les garages', 'fas fa-city', Garages::class);
            yield MenuItem::linkToCrud('Gérer les services', 'fa-solid fa-handshake', Services::class);
        }
    }
}
