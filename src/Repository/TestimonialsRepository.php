<?php

namespace App\Repository;

use App\Entity\Testimonials;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Testimonials>
 *
 * @method Testimonials|null find($id, $lockMode = null, $lockVersion = null)
 * @method Testimonials|null findOneBy(array $criteria, array $orderBy = null)
 * @method Testimonials[]    findAll()
 * @method Testimonials[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TestimonialsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Testimonials::class);
    }

    /**
     * @return Testimonials[] Returns an array of Testimonials objects
     */
    public function findByValidated($value): array
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.validated = :validated')
            ->setParameter('validated', $value)
            ->getQuery()
            ->getResult();
    }
}
