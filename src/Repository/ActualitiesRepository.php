<?php

namespace App\Repository;

use App\Entity\Actualities;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Actualities|null find($id, $lockMode = null, $lockVersion = null)
 * @method Actualities|null findOneBy(array $criteria, array $orderBy = null)
 * @method Actualities[]    findAll()
 * @method Actualities[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActualitiesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Actualities::class);
    }

    // /**
    //  * @return Actualities[] Returns an array of Actualities objects
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
    public function findOneBySomeField($value): ?Actualities
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
