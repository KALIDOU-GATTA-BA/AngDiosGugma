<?php

namespace App\Repository;

use App\Entity\CommentsHongkong;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CommentsHongkong|null find($id, $lockMode = null, $lockVersion = null)
 * @method CommentsHongkong|null findOneBy(array $criteria, array $orderBy = null)
 * @method CommentsHongkong[]    findAll()
 * @method CommentsHongkong[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommentsHongkongRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CommentsHongkong::class);
    }

    // /**
    //  * @return CommentsHongkong[] Returns an array of CommentsHongkong objects
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
    public function findOneBySomeField($value): ?CommentsHongkong
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
