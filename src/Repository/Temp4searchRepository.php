<?php

namespace App\Repository;

use App\Entity\Temp4search;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Temp4search|null find($id, $lockMode = null, $lockVersion = null)
 * @method Temp4search|null findOneBy(array $criteria, array $orderBy = null)
 * @method Temp4search[]    findAll()
 * @method Temp4search[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Temp4searchRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Temp4search::class);
    }

    // /**
    //  * @return Temp4search[] Returns an array of Temp4search objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Temp4search
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
