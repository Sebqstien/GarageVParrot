<?php

namespace App\Entity;

use App\Repository\SchedulesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SchedulesRepository::class)]
class Schedules
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $openedDays = null;

    #[ORM\Column(length: 60)]
    private ?string $hoursAM = null;

    #[ORM\Column(length: 60)]
    private ?string $hoursPM = null;

    #[ORM\OneToMany(mappedBy: 'schedules', targetEntity: Garages::class)]
    private Collection $garage;

    public function __construct()
    {
        $this->garage = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOpenedDays(): ?string
    {
        return $this->openedDays;
    }

    public function setOpenedDays(string $openedDays): static
    {
        $this->openedDays = $openedDays;

        return $this;
    }

    public function getHoursAM(): ?string
    {
        return $this->hoursAM;
    }

    public function setHoursAM(string $hoursAM): static
    {
        $this->hoursAM = $hoursAM;

        return $this;
    }

    public function getHoursPM(): ?string
    {
        return $this->hoursPM;
    }

    public function setHoursPM(string $hoursPM): static
    {
        $this->hoursPM = $hoursPM;

        return $this;
    }

    /**
     * @return Collection<int, Garages>
     */
    public function getGarage(): Collection
    {
        return $this->garage;
    }

    public function addGarage(Garages $garage): static
    {
        if (!$this->garage->contains($garage)) {
            $this->garage->add($garage);
            $garage->setSchedules($this);
        }

        return $this;
    }

    public function removeGarage(Garages $garage): static
    {
        if ($this->garage->removeElement($garage)) {
            // set the owning side to null (unless already changed)
            if ($garage->getSchedules() === $this) {
                $garage->setSchedules(null);
            }
        }

        return $this;
    }
}
