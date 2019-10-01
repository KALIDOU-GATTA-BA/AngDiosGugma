<?php

namespace App\Repository;

use App\Entity\ActualitiesHongkong;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ActualitiesHongkong|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActualitiesHongkong|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActualitiesHongkong[]    findAll()
 * @method ActualitiesHongkong[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActualitiesHongkongRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ActualitiesHongkong::class);
    }

    // /**
    //  * @return ActualitiesHongkong[] Returns an array of ActualitiesHongkong objects
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
    public function findOneBySomeField($value): ?ActualitiesHongkong
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
