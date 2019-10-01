<?php

namespace App\Repository;

use App\Entity\CommentsCanada;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CommentsCanada|null find($id, $lockMode = null, $lockVersion = null)
 * @method CommentsCanada|null findOneBy(array $criteria, array $orderBy = null)
 * @method CommentsCanada[]    findAll()
 * @method CommentsCanada[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommentsCanadaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CommentsCanada::class);
    }

    // /**
    //  * @return CommentsCanada[] Returns an array of CommentsCanada objects
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
    public function findOneBySomeField($value): ?CommentsCanada
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
