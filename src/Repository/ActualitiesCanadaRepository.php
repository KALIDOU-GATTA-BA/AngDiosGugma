<?php

namespace App\Repository;

use App\Entity\ActualitiesCanada;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ActualitiesCanada|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActualitiesCanada|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActualitiesCanada[]    findAll()
 * @method ActualitiesCanada[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActualitiesCanadaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ActualitiesCanada::class);
    }

    // /**
    //  * @return ActualitiesCanada[] Returns an array of ActualitiesCanada objects
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
    public function findOneBySomeField($value): ?ActualitiesCanada
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
