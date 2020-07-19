<?php

namespace App\Repository;

use App\Entity\SponsorPayments;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method SponsorPayments|null find($id, $lockMode = null, $lockVersion = null)
 * @method SponsorPayments|null findOneBy(array $criteria, array $orderBy = null)
 * @method SponsorPayments[]    findAll()
 * @method SponsorPayments[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SponsorPaymentsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SponsorPayments::class);
    }

    // /**
    //  * @return SponsorPayments[] Returns an array of SponsorPayments objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SponsorPayments
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
