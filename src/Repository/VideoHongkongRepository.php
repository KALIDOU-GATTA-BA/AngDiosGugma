<?php

namespace App\Repository;

use App\Entity\VideoHongkong;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method VideoHongkong|null find($id, $lockMode = null, $lockVersion = null)
 * @method VideoHongkong|null findOneBy(array $criteria, array $orderBy = null)
 * @method VideoHongkong[]    findAll()
 * @method VideoHongkong[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VideoHongkongRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, VideoHongkong::class);
    }

    // /**
    //  * @return VideoHongkong[] Returns an array of VideoHongkong objects
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
    public function findOneBySomeField($value): ?VideoHongkong
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
