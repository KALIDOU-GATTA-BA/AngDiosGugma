<?php

namespace App\Repository;

use App\Entity\YouTube;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method YouTube|null find($id, $lockMode = null, $lockVersion = null)
 * @method YouTube|null findOneBy(array $criteria, array $orderBy = null)
 * @method YouTube[]    findAll()
 * @method YouTube[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class YouTubeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, YouTube::class);
    }

    // /**
    //  * @return YouTube[] Returns an array of YouTube objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('y')
            ->andWhere('y.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('y.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?YouTube
    {
        return $this->createQueryBuilder('y')
            ->andWhere('y.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
