<?php

namespace App\Repository;

use App\Entity\VideoSingapore;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method VideoSingapore|null find($id, $lockMode = null, $lockVersion = null)
 * @method VideoSingapore|null findOneBy(array $criteria, array $orderBy = null)
 * @method VideoSingapore[]    findAll()
 * @method VideoSingapore[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VideoSingaporeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, VideoSingapore::class);
    }

    // /**
    //  * @return VideoSingapore[] Returns an array of VideoSingapore objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VideoSingapore
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
