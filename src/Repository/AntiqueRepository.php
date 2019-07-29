<?php

namespace App\Repository;

use App\Entity\Antique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Antique|null find($id, $lockMode = null, $lockVersion = null)
 * @method Antique|null findOneBy(array $criteria, array $orderBy = null)
 * @method Antique[]    findAll()
 * @method Antique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AntiqueRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Antique::class);
    }

    // /**
    //  * @return Antique[] Returns an array of Antique objects
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
    public function findOneBySomeField($value): ?Antique
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
