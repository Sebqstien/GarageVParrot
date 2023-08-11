<?php

namespace App\Twig;

use App\Entity\Garages;
use App\Entity\Schedules;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class FooterDataExtension extends AbstractExtension
{
    private EntityManagerInterface $entityManager;


    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    public function getFunctions(): array
    {
        return [
            new TwigFunction('footerData', [$this, 'getFooterData'])
        ];
    }


    public function getFooterData(): array
    {
        $garages = $this->entityManager->getRepository(Garages::class)->findAll();
        $schedules = $this->entityManager->getRepository(Schedules::class)->findAll();

        return [
            'garages' => $garages,
            'schedules' => $schedules,
        ];
    }
}
