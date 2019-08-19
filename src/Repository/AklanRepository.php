<?php

namespace App\Repository;

use App\Entity\Aklan;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Aklan|null find($id, $lockMode = null, $lockVersion = null)
 * @method Aklan|null findOneBy(array $criteria, array $orderBy = null)
 * @method Aklan[]    findAll()
 * @method Aklan[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AklanRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Aklan::class);
    }

    // /**
    //  * @return Aklan[] Returns an array of Aklan objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Aklan
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
