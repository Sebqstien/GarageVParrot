<?php

namespace App\Repository;

use App\Entity\Schedules;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Schedules>
 *
 * @method Schedules|null find($id, $lockMode = null, $lockVersion = null)
 * @method Schedules|null findOneBy(array $criteria, array $orderBy = null)
 * @method Schedules[]    findAll()
 * @method Schedules[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SchedulesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Schedules::class);
    }
}
