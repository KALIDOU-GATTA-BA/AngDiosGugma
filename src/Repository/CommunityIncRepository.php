<?php

namespace App\Repository;

use App\Entity\CommunityInc;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CommunityInc|null find($id, $lockMode = null, $lockVersion = null)
 * @method CommunityInc|null findOneBy(array $criteria, array $orderBy = null)
 * @method CommunityInc[]    findAll()
 * @method CommunityInc[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommunityIncRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CommunityInc::class);
    }

    // /**
    //  * @return CommunityInc[] Returns an array of CommunityInc objects
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
    public function findOneBySomeField($value): ?CommunityInc
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
