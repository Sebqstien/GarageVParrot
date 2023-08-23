<?php

namespace App\Twig;

use App\Repository\GaragesRepository;
use App\Repository\SchedulesRepository;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class FooterDataExtension extends AbstractExtension
{


    public function __construct(private SchedulesRepository $schedulesRepository, private GaragesRepository $garagesRepository)
    {
        $this->schedulesRepository = $schedulesRepository;
        $this->garagesRepository = $garagesRepository;
    }



    public function getFunctions(): array
    {
        return [
            new TwigFunction('footerData', [$this, 'getFooterData'])
        ];
    }


    public function getFooterData(): array
    {
        $garages = $this->garagesRepository->findAll();
        $schedules = $this->schedulesRepository->findAll();

        return [
            'garages' => $garages,
            'schedules' => $schedules,
        ];
    }
}
