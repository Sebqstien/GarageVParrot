<?php

namespace App\Twig;

use Doctrine\ORM\EntityManager;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class FooterDataExtension extends AbstractExtension
{
    private EntityManager $entityManager;


    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    public function getFunctions(): array
    {
        return [
            new TwigFunction('footerData', [$this, 'getFooterData'])
        ];
    }


    public function getFooterData()
    {
        $garages = $this->entityManager->getRepository(Garages::class)->findAll();
        $schedules = $this->entityManager->getRepository(Schedules::class)->findAll();
        $footerData = array($garages, $schedules);
        return $footerData;
    }
}
