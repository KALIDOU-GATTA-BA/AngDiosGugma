<?php

namespace App\Repository;

use App\Entity\MetroManila;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MetroManila|null find($id, $lockMode = null, $lockVersion = null)
 * @method MetroManila|null findOneBy(array $criteria, array $orderBy = null)
 * @method MetroManila[]    findAll()
 * @method MetroManila[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MetroManilaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MetroManila::class);
    }

    // /**
    //  * @return MetroManila[] Returns an array of MetroManila objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MetroManila
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
