<?php

namespace App\Repository;

use App\Entity\Ads;
use App\Data\SearchData;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Ads>
 *
 * @method Ads|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ads|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ads[]    findAll()
 * @method Ads[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ads::class);
    }

    public function findSearch(SearchData $search): array
    {
        $qb = $this->createQueryBuilder('a')
            ->select('c', 'a')
            ->join('a.cars', 'c');

        if (!empty($search->priceMin)) {
            $qb->andWhere('a.price >= :priceMin')
                ->setParameter('priceMin', $search->priceMin);
        }

        if (!empty($search->priceMax)) {
            $qb->andWhere('a.price <= :priceMax')
                ->setParameter('priceMax', $search->priceMax);
        }

        if (!empty($search->kilometersMin)) {
            $qb->andWhere('c.kilometers >= :kilometersMin')
                ->setParameter('kilometersMin', $search->kilometersMin);
        }

        if (!empty($search->kilometersMax)) {
            $qb->andWhere('c.kilometers <= :kilometersMax')
                ->setParameter('kilometersMax', $search->kilometersMax);
        }

        if (!empty($search->yearMin)) {
            $qb->andWhere('c.year >= :yearMin')
                ->setParameter('yearMin', $search->yearMin);
        }

        if (!empty($search->yearMax)) {
            $qb->andWhere('c.year <= :yearMax')
                ->setParameter('yearMax', $search->yearMax);
        }

        if (!empty($search->brand)) {
            $qb->andWhere('c.brand = :brand')
                ->setParameter('brand', $search->brand);
        }

        if (!empty($search->energy)) {
            $qb->andWhere('c.energy = :energy')
                ->setParameter('energy', $search->energy);
        }

        return $qb->getQuery()->getResult();
    }
}
