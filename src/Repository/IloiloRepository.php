<?php

namespace App\Repository;

use App\Entity\Iloilo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Iloilo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Iloilo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Iloilo[]    findAll()
 * @method Iloilo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IloiloRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Iloilo::class);
    }

    // /**
    //  * @return Iloilo[] Returns an array of Iloilo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Iloilo
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
