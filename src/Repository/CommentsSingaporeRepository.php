<?php

namespace App\Repository;

use App\Entity\CommentsSingapore;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CommentsSingapore|null find($id, $lockMode = null, $lockVersion = null)
 * @method CommentsSingapore|null findOneBy(array $criteria, array $orderBy = null)
 * @method CommentsSingapore[]    findAll()
 * @method CommentsSingapore[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommentsSingaporeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CommentsSingapore::class);
    }

    // /**
    //  * @return CommentsSingapore[] Returns an array of CommentsSingapore objects
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
    public function findOneBySomeField($value): ?CommentsSingapore
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
