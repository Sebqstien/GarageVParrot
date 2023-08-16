<?php

namespace App\Controller\Admin;

use App\Entity\Garages;
use App\Entity\Schedules;
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

        return $this->redirect($this->adminUrlGenerator->setController(UsersCrudController::class)->generateUrl());
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
        yield MenuItem::linkToCrud('Avis clients', 'fa-solid fa-star', Testimonials::class);
        if ($this->isGranted('ROLE_ADMIN')) {
            yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-user', Users::class);
            yield MenuItem::linkToCrud('Horaires', 'fas fa-clock', Schedules::class);
            yield MenuItem::linkToCrud('Garages', 'fas fa-city', Garages::class);
        }
    }
}
