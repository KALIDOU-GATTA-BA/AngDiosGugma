<?php

namespace App\Repository;

use App\Entity\CommentsVideoSingapore;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CommentsVideoSingapore|null find($id, $lockMode = null, $lockVersion = null)
 * @method CommentsVideoSingapore|null findOneBy(array $criteria, array $orderBy = null)
 * @method CommentsVideoSingapore[]    findAll()
 * @method CommentsVideoSingapore[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommentsVideoSingaporeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CommentsVideoSingapore::class);
    }

    // /**
    //  * @return CommentsVideoSingapore[] Returns an array of CommentsVideoSingapore objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CommentsVideoSingapore
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
