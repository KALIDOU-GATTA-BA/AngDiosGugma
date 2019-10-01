<?php

namespace App\Repository;

use App\Entity\CommentsVideoHongkong;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CommentsVideoHongkong|null find($id, $lockMode = null, $lockVersion = null)
 * @method CommentsVideoHongkong|null findOneBy(array $criteria, array $orderBy = null)
 * @method CommentsVideoHongkong[]    findAll()
 * @method CommentsVideoHongkong[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommentsVideoHongkongRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CommentsVideoHongkong::class);
    }

    // /**
    //  * @return CommentsVideoHongkong[] Returns an array of CommentsVideoHongkong objects
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
    public function findOneBySomeField($value): ?CommentsVideoHongkong
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
