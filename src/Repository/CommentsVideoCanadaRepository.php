<?php

namespace App\Repository;

use App\Entity\CommentsVideoCanada;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CommentsVideoCanada|null find($id, $lockMode = null, $lockVersion = null)
 * @method CommentsVideoCanada|null findOneBy(array $criteria, array $orderBy = null)
 * @method CommentsVideoCanada[]    findAll()
 * @method CommentsVideoCanada[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommentsVideoCanadaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CommentsVideoCanada::class);
    }

    // /**
    //  * @return CommentsVideoCanada[] Returns an array of CommentsVideoCanada objects
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
    public function findOneBySomeField($value): ?CommentsVideoCanada
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
